<div class="p-16">
    <div x-data="{
        open: false,
    }" class="w-full">
        <div x-show="open" @click.outside="open = false" x-data="{
            datas: [
                { id: 1, content: 'item 1' },
                { id: 2, content: 'item 2' },
                { id: 3, content: 'item 3' },
                { id: 4, content: 'item 4' },
            ]
        }"
            class="w-full transition duration-200 flex justify-center mb-4">
            <template x-for="data in datas" :key="data.id">
                <button class="font-semibold px-10 border-b-2 hover:scale-110 hover:border-blue-600"
                    x-text="data.content"> </button>
            </template>
        </div>
        <button @click="open = ! open"
            class="p-2 border-2 rounded-lg w-full flex justify-center hover:bg-slate-100 focus:bg-slate-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
    </div>
</div>
<div class="px-16">
    <div class="w-full h-64 mx-auto mt-4 relative">
        <div x-data="{
            activeSlide: 1,
            slides: [
                { id: 1, image: 'https://flowbite.com/docs/images/carousel/carousel-1.svg' },
                { id: 2, image: 'https://flowbite.com/docs/images/carousel/carousel-2.svg' },
                { id: 3, image: 'https://flowbite.com/docs/images/carousel/carousel-3.svg' }
            ],
            loop() {
                setInterval(() => { this.activeSlide = this.activeSlide === 3 ? 1 : this.activeSlide + 1 }, 3000)
            }
        }" x-init="loop">
            <div class="absolute w-full flex justify-center p-4 border-2">
                <template x-for="slide in slides" :key="slide.id">
                    <div class="h-64 transition duration-3000 delay-100 "
                        :class="{
                            'scale-110 transition-transform -translate-y-6 w-full': activeSlide ===
                                slide
                                .id,
                            'opacity-50 translate-0': activeSlide !== slide.id
                        }">
                        <button x-on:click="activeSlide = slide.id " class="w-full h-full object-cover">
                            <img :src="slide.image" class="w-full h-full object-cover" alt="Slide">
                        </button>
                    </div>
                </template>
            </div>
            <div class="absolute -bottom-5 w-full flex items-center justify-center px-4 py-5 gap-4">
                <template x-for="slide in slides" :key="slide.id">
                    <button class="w-4 h-4 bg-slate-400 rounded-full flex"
                        :class="{
                            'bg-slate-800': activeSlide === slide.id,
                            'bg-slate-200': activeSlide !== slide.id
                        }"
                        x-on:click="activeSlide = slide.id"></button>
                </template>
            </div>
        </div>
    </div>
    <div class="w-full h-64 mx-auto mt-8 relative">
        <div x-data="{
            activeSlide: 1,
            slides: [
                { id: 1, image: 'https://flowbite.com/docs/images/carousel/carousel-1.svg' },
                { id: 2, image: 'https://flowbite.com/docs/images/carousel/carousel-2.svg' },
                { id: 3, image: 'https://flowbite.com/docs/images/carousel/carousel-3.svg' }
            ],
            loop() {
                setInterval(() => { this.activeSlide = this.activeSlide === 3 ? 1 : this.activeSlide + 1 }, 2000)
            }
        }" x-init="loop">
            <div class="absolute w-full flex justify-center p-4 border-2">
                <template x-for="slide in slides" :key="slide.id">
                    <div x-show="activeSlide === slide.id" class="h-64 w-full transition-opacity duration-1000  "
                        :class="{ 'opacity-100': activeSlide === slide.id, 'opacity-30': activeSlide !== slide.id }">
                        <img :src="slide.image" class="w-full h-full object-cover " alt="Slide">
                    </div>
                </template>
            </div>
            <div class="absolute -bottom-20 w-full flex items-center justify-center px-4 py-5 gap-4">
                <template x-for="slide in slides" :key="slide.id">
                    <button class="w-4 h-4 bg-slate-400 rounded-full flex"
                        :class="{
                            'bg-slate-800': activeSlide === slide.id,
                            'bg-slate-200': activeSlide !== slide.id
                        }"
                        x-on:click="activeSlide = slide.id"></button>
                </template>
            </div>
        </div>
    </div>
</div>
<div class="p-16">
    <div class="w-full p-4 border-2">
        <div class="h-56 flex justify-center items-center ">
            <h1 x-data="{ text: '', index: 0, messages: ['Selamat Datang'] }" x-init="() => {
                setInterval(() => {
                    text = messages[index].substring(0, text.length + 1);
                    if (text === messages[index]) {
                        setTimeout(() => {
                            index = (index + 1) % messages.length; // Reset index after reaching last message
                            text = ''; // Clear text for next iteration
                        }, 100); // Delay before resetting
                    }
                }, 200); // Typing speed
            }" x-text="text"  
            class="text-6xl font-bold text-blue-600"></h1>
            <span class="text-6xl font-bold text-blue-600 blink">|</span>
        </div>
    </div>
</div>
<div class="px-16">
    <div class="w-full border-2">
        <div class="h-56 flex justify-center items-center " x-data="{
            count: 0,
            data: 25,
            isShown: true
        }" x-init="() => {
            setInterval(() => {
                if (isShown) { // Check if element is in viewport
                    if (count < data) {
                        count++;
                        count = count;
                    }
                }
            }, 100)
        }">
            <div class="flex">
                <h1 class="text-8xl font-bold" x-text="count"></h1>
                <span class="font-bold text-4xl text-red-600">+</span>
            </div>
        </div>
    </div>
</div>
<div class="p-16">
    <div class="w-full h-80 border flex justify-center items-center">
        <div class="grid grid-cols-2 gap-4">
            <div class="h-12 w-12 border p-6 flex justify-center items-center duration-100 hover:scale-150 hover:bg-yellow-200 hover:-skew-x-3">a</div>
            <div class="h-12 w-12 border p-6 flex justify-center items-center duration-100 hover:scale-150 hover:bg-yellow-200 hover:skew-y-3">a</div>
            <div class="h-12 w-12 border p-6 flex justify-center items-center duration-100 hover:scale-150 hover:bg-yellow-200 hover:skew-x-3">a</div>
            <div class="h-12 w-12 border p-6 flex justify-center items-center duration-100 hover:scale-150 hover:bg-yellow-200 hover:-skew-y-3">a</div>
        </div>
    </div>
</div>

<div class="p-16">
    <div class="w-full relative">
        <div x-data="{ isOpen: false }">
            <!-- Modal Trigger Button -->
            <button @click="isOpen = true"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded animate-bounce">
                Open Modal
            </button>
            <button @click="isOpen = true"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded animate-pulse">
                Open Modal
            </button>
            <button @click="isOpen = true"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                <span class="relative inline-flex rounded-full h-3 w-3 bg-slate-500">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-slate-400 opacity-75"></span>
                </span>
                Open Modal
            </button>

            <!-- Modal Background -->
            <div x-show="isOpen" @click.away="isOpen = false"
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <!-- Modal Content -->
                <div class="bg-white rounded-lg p-8 max-w-md">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Modal Title</h2>
                        <!-- Close Button -->
                        <button @click="isOpen = false"
                            class="text-gray-500 hover:text-gray-600 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                        ultricies
                        placerat arcu, eu fringilla nibh gravida id.</p>
                    <!-- Modal Footer -->
                    <div class="mt-4">
                        <button @click="isOpen = false"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Close</button>
                        <button class="bg-blue-500 hover:bg-blue-600 hover:transition hover:-translate-y-2 duration-100 text-white font-bold py-2 px-4 rounded">Save
                            Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>