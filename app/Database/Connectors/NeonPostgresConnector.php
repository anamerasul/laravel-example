<?php

namespace App\Database\Connectors;

use Illuminate\Database\Connectors\PostgresConnector;

class NeonPostgresConnector extends PostgresConnector
{
    /**
     * Add SSL and Neon options to the DSN.
     *
     * @param  string  $dsn
     * @param  array  $config
     * @return string
     */
    protected function addSslOptions($dsn, array $config)
    {
        $dsn = parent::addSslOptions($dsn, $config);

        // Neon: supply endpoint ID for clients without SNI support.
        $endpoint = $config['endpoint'] ?? null;

        if (! $endpoint && isset($config['host'])) {
            // Try to infer endpoint from host: ep-xxxxxx(-pooler).region.aws.neon.tech
            $hostFirstLabel = explode('.', $config['host'])[0] ?? null;
            if (is_string($hostFirstLabel) && str_starts_with($hostFirstLabel, 'ep-')) {
                // Remove optional '-pooler' suffix from the endpoint label
                $endpoint = preg_replace('/-pooler$/', '', $hostFirstLabel);
            }
        }

        if ($endpoint) {
            $dsn .= ";options=endpoint={$endpoint}";
        }

        return $dsn;
    }
}