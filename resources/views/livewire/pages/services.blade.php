<div>
    <section class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Our Services</h1>
        <p class="text-gray-600">Web design, development, and SEO tailored to grow your business.</p>
    </section>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($services as $service)
            <article class="bg-white rounded-lg shadow-sm border p-5">
                <h2 class="text-xl font-semibold">{{ $service->name }}</h2>
                @if($service->short_description)
                    <p class="text-gray-600 mt-1">{{ $service->short_description }}</p>
                @endif
                <div class="mt-3 text-sm text-gray-500">
                    @if(!is_null($service->price_min))
                        <span>From ${{ number_format($service->price_min, 0) }}</span>
                    @endif
                    @if(!is_null($service->price_max))
                        <span> to ${{ number_format($service->price_max, 0) }}</span>
                    @endif
                </div>
                @if($service->description)
                    <p class="mt-3 text-gray-700">{{ $service->description }}</p>
                @endif
                <a href="#contact" class="mt-4 inline-block text-blue-600 hover:text-blue-700">Request a quote →</a>
            </article>
        @endforeach
    </div>
</div>
