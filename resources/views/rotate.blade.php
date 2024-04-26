<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white">
    <div class="grid grid-cols-2" x-data="{
        rotation: 0,
        activeFood: 1,
        foods: [
            { id: 1, name: 'Food 1', image: 'img/food1.png', description: 'Delicious Food 1', price: 5 },
            { id: 2, name: 'Food 2', image: 'img/food2.png', description: 'Yummy Food 2', price: 15 },
            { id: 3, name: 'Food 3', image: 'img/food3.png', description: 'Tasty Food 3', price: 25 },
            { id: 4, name: 'Food 4', image: 'img/food4.png', description: 'Scrumptious Food 4', price: 50 }
        ]
    }">
        <div class="relative w-full h-full">
            <div class="w-[1200px] h-[1200px] absolute -top-[800px] -left-80 transition-transform duration-1000"
                :style="'transform: rotate(' + rotation + 'deg)'">
                <div
                    class="p-16 border-[75px] border-opacity-50 relative w-full h-full rounded-full border-[#7ABB5C] flex justify-center items-center">
                    <template x-for="food in foods" :key="food.id">
                        <div
                            :class="{
                                'absolute top-full right-1/2 transform -translate-y-1/2 translate-x-1/2': food.id === 1,
                                'absolute top-1/2 right-0 transform -translate-y-1/2 translate-x-1/2': food.id === 2,
                                'absolute top-0 left-1/2 transform -translate-y-1/2 -translate-x-1/2': food.id === 3,
                                'absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-1/2': food.id === 4
                            }">
                            <div class="w-96 h-96 rounded-full">
                                <div class="w-full h-full rounded-full bg-[#7ABB5C] z-0"
                                    :class="{
                                        'flex justify-center items-center': food.id !== 1
                                    }">
                                    <img :src="food.image" alt=""
                                        :class="{
                                            'opacity-100 transition-opacity duration-1000': activeFood === food.id,
                                            'opacity-10 transition-opacity duration-500': activeFood !== food.id,
                                            'w-80 h-80 object-cover': food.id !== 1,
                                            'w-96 h-96 object-cover transition -translate-y-5 -translate-x-1 ': food.id ===
                                                1,
                                        }">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <div class="w-full h-full mt-10 relative">
            <div>
                <h1 x-text="foods[activeFood - 1].name" class="text-8xl font-bold text-black"></h1>
            </div>
            <div class="mt-2">
                <span class="underline">Description:</span>
                <p x-text="foods[activeFood - 1].description" class="text-2xl text-black"></p>
            </div>
            <div class="mt-2">
                <span class="underline">Price:</span><br>
                <div class="flex">
                    <span class="text-2xl">$</span>
                    <p x-text="foods[activeFood - 1].price" class="text-6xl font-bold text-red-600"></p>
                </div>
            </div>

            <div class="w-full h-full p-12 relative">
                <div x-on:click="activeFood = (activeFood === 1 ? foods.length : activeFood - 1);rotation = (activeFood - 1) * 90"
                    class="absolute z-10 left-16 top-28">
                    <button class="h-12 w-12 rounded-full bg-[#7ABB5C] flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>

                    </button>
                </div>
                <div x-on:click="activeFood = (activeFood === foods.length ? 1 : activeFood + 1);rotation = (activeFood - 1) * 90""
                    class="absolute z-10 right-16 top-28">
                    <button class="h-12 w-12 rounded-full bg-[#7ABB5C] flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>

                    </button>
                </div>
                <div class="flex justify-center items-center gap-6">
                    <template x-for="food in foods" :key="food.id">
                        <button @click="activeFood = food.id; rotation = (food.id - 1) * 90"
                            :class="{
                                'bg-[#7ABB5C] text-white font-bold transition scale-110 duration-2000 -translate-y-4': activeFood ===
                                    food.id
                            }"
                            class="p-8 border-4 border-[#7ABB5C] rounded-lg flex justify-center hover:bg-[#7ABB5C]">
                            <div>
                                <div class="flex justify-center">
                                    <img :src="food.image" alt="" class="w-24 h-24 object-cover">
                                </div>
                                <div>
                                    <span x-text="food.name"></span>
                                </div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
