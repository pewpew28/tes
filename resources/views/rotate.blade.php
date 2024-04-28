<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-opacity-10 bg-[#7ABB5C] ">
    <div class="w-full h-full" x-data="{
        rotation: 0,
        activeFood: 1,
        foods: [
            { id: 1, name: 'Food 1', image: 'img/food1.png', description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perspiciatis accusamus consectetur distinctio quaerat. Repellat non hic eveniet totam eius.', price: 50000 },
            { id: 2, name: 'Food 2', image: 'img/food2.png', description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perspiciatis accusamus consectetur distinctio quaerat. Repellat non hic eveniet totam eius.', price: 150000 },
            { id: 3, name: 'Food 3', image: 'img/food3.png', description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perspiciatis accusamus consectetur distinctio quaerat. Repellat non hic eveniet totam eius.', price: 250000 },
            { id: 4, name: 'Food 4', image: 'img/food4.png', description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex perspiciatis accusamus consectetur distinctio quaerat. Repellat non hic eveniet totam eius.', price: 50000 },
        ]
    }">
        {{--  --}}
        <div class="flex">
            <div class="relative w-full h-full ">
                <div class="w-[1500px] h-[1500px] absolute -top-[1150px] -left-96 transition-transform duration-1000"
                    :style="'transform: rotate(' + rotation + 'deg)'">
                    <div
                        class="p-16 border-[100px] border-opacity-50 relative w-full h-full rounded-full border-[#7ABB5C] flex justify-center items-center">
                        <template x-for="(food,index) in foods" :key="food.id">
                            <div
                                :class="{
                                    'absolute -bottom-[26rem] left-80 transform -translate-y-1/2 translate-x-1/2': food
                                        .id ===
                                        1,
                                    'absolute top-1/2 -right-8 transform -translate-y-1/2 translate-x-1/2': food.id ===
                                        2,
                                    'absolute -top-4 left-1/2 transform -translate-y-1/2 -translate-x-1/2': food.id ===
                                        3,
                                    'absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-1/2': food.id ===
                                        4
                                }">
                                <div class="w-96 h-96 rounded-full">
                                    <div class="w-full h-full rounded-full border-4 flex justify-center items-center border-[#7ABB5C]"
                                        :class="{
                                            'opacity-100 transition-opacity duration-1000': activeFood === food.id,
                                            'opacity-0 transition-opacity duration-500': activeFood !== food.id,
                                        }">
                                        <div class="w-80 h-80 rounded-full bg-[#7ABB5C]"
                                            :class="{
                                                'flex justify-center items-center': food.id !== 1,
                                                'opacity-100 z-0 transition-opacity duration-1000': activeFood === food
                                                    .id,
                                                'opacity-0 transition-opacity duration-500': activeFood !== food.id,
                                            }">
                                            <img :src="food.image" alt=""
                                                :class="{
                                                    'opacity-100 z-20 transition-opacity duration-1000': activeFood ===
                                                        food
                                                        .id,
                                                    'opacity-0 transition-opacity duration-500': activeFood !== food.id,
                                                    'w-72 h-72 object-cover': food.id !== 1,
                                                    'w-80 h-80 object-cover transition -translate-x-1 -translate-y-4 ': food
                                                        .id ===
                                                        1,
                                                }">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="w-full h-full mt-10 p-20 col-span-2 relative">
                <div class="flex h-fit w-full flex justify-center items-center">
                    <div class="w-80">
                        <h1 x-text="foods[activeFood - 1].name" class="text-6xl font-bold text-black font-sans py-2"></h1>
                    </div>
                    <div class="w-full flex items-center">
                        <span class="py-2 px-2 rounded-lg bg-[#7CC443] text-2xl font-semibold text-white">Fast Food</span>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex py-4">
                        <span class="text-5xl font-semibold">Rp.</span>
                        <p x-text="foods[activeFood - 1].price" class="text-5xl font-semibold"></p>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="font-bold text-lg">Ingredients:</span>
                    <p x-text="foods[activeFood - 1].description" class="text-xl text-black"></p>
                </div>
                <div class="mt-8">
                    <button class="py-2 px-8 rounded-full bg-[#5EB817] font-bold text-white">Details</button>
                </div>
            </div>
        </div>

        <div class="w-full h-full p-12 relative flex justify-center">
            <div>
                <div x-on:click="activeFood = (activeFood === 1 ? foods.length : activeFood - 1);rotation = (activeFood - 1) * 90"
                    class="absolute z-10 left-96 top-28">
                    <button
                        class="h-12 w-12 rounded-full flex justify-center items-center hover:transition hover:scale-110 hover:duration-500 duration-500 hover:opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>

                    </button>
                </div>
                <div x-on:click="activeFood = (activeFood === foods.length ? 1 : activeFood + 1);rotation = (activeFood - 1) * 90"
                    class="absolute z-10 right-96 top-28">
                    <button
                        class="h-12 w-12 rounded-full flex justify-center items-center hover:transition hover:scale-110 hover:duration-500 duration-500 hover:opacity-75">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>

                    </button>
                </div>
            </div>
            <div class="flex w-full justify-center items-center gap-8">
                <template x-for="(food,index) in foods" :key="food.id">
                    <div>
                        <button @click="activeFood = food.id; rotation = (food.id - 1) * 90"
                            :class="{
                                'bg-white bg-opacity-40 text-[#7ABB5C] font-bold transition scale-110 duration-2000 -translate-y-4 shadow-lg': activeFood ===
                                    food.id
                            }"
                            class="p-8 flex justify-center">
                            <div>
                                <div class="w-36 h-36 relative flex justify-center items-center">
                                    <div class="absolute"
                                        :class="{
                                            'absolute w-36 h-36 rounded-full bg-[#7ABB5C] bg-opacity-50': activeFood ===
                                                food.id,
                                        }">
                                    </div>
                                    <img :src="food.image" alt="" class="absolute object-cover"
                                        :class="{
                                            'absolute -translate-y-2 w-36 h-36': activeFood === 1,
                                            'absolute w-32 h-32': activeFood !== 1,
                                        }">
                                </div>
                                <div class="pt-10">
                                    <span x-text="food.name" class="font-bold text-[#7ABB5C]"></span>
                                </div>
                            </div>
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>

</body>

</html>
