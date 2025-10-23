<div id="contact">
    <section class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Contact</h1>
        <p class="text-gray-600 mb-6">Tell me a bit about your project and I’ll reply shortly.</p>

        @if($submitted)
            <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded mb-6">
                Thanks! Your message was sent.
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label class="block text-sm font-medium">Name</label>
                <input type="text" wire:model.defer="name" class="mt-1 w-full border rounded px-3 py-2" placeholder="Your name">
                @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" wire:model.defer="email" class="mt-1 w-full border rounded px-3 py-2" placeholder="you@example.com">
                @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Phone (optional)</label>
                <input type="text" wire:model.defer="phone" class="mt-1 w-full border rounded px-3 py-2" placeholder="+1 234 567 8900">
            </div>
            <div>
                <label class="block text-sm font-medium">Service Interest</label>
                <select wire:model.defer="service_interest" class="mt-1 w-full border rounded px-3 py-2">
                    <option value="">Select a service</option>
                    <option>Web Design</option>
                    <option>Web Development</option>
                    <option>SEO Services</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Message</label>
                <textarea wire:model.defer="message" rows="5" class="mt-1 w-full border rounded px-3 py-2" placeholder="What are you looking to achieve?"></textarea>
                @error('message') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">Send</button>
        </form>
    </section>
</div>
