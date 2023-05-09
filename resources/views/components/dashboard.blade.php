<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>

<!-- Alpine Core -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.5/axios.min.js" integrity="sha512-nnNHpffPSgINrsR8ZAIgFUIMexORL5tPwsfktOTxVYSv+AUAILuFYWES8IHl+hhIhpFGlKvWFiz9ZEusrPcSBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<head>
    <link rel="icon" type="image/png" href="https://media.licdn.com/dms/image/C510BAQEmOVTLJpdTHA/company-logo_200_200/0/1577625957547?e=2147483647&v=beta&t=QTJDVX67v6zK0GbAVLA1E_i4wlummueC0ey61NilGgE">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Curve</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    @vite('resources/css/app.css')

</head>

<body>
    <main class="relative h-screen overflow-y-hidden bg-gray-100 -800  overflow-auto">
        <div class="flex items-start justify-between  overflow-auto">
            <div class="hidden lg:block relative h-screen my-4 min-w-[15.5rem] ml-4 shadow-lg  w-2/12">
                <div class="h-full bg-white rounded-2xl ">
                    <div class="flex items-center justify-center pt-6">
                        <img class="w-10 rounded-full" src="https://media.licdn.com/dms/image/C510BAQEmOVTLJpdTHA/company-logo_200_200/0/1577625957547?e=2147483647&v=beta&t=QTJDVX67v6zK0GbAVLA1E_i4wlummueC0ey61NilGgE" alt="">
                    </div>
                    <nav class="mt-6">
                        <div>
                            <a href="/" class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 -200 hover:text-blue-500">
                                <span class="text-left">
                                    <x-svgs name="employee" class="w-5" />
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Dashboard
                                </span>
                            </a>
                            <a href="/about" class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 -200 hover:text-blue-500" >
                                <span class="text-left">
                                    <x-svgs name="employee" class="w-5" />
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    About
                                </span>
                            </a>
                            <a href="/contact" class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 -200 hover:text-blue-500" >
                                <span class="text-left">
                                    <x-svgs name="employee" class="w-5" />
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Contact
                                </span>
                            </a>
                        </div>

                    </nav>
                </div>
            </div>
            <div class="flex flex-col  pl-0 p-4 space-y-4 w-full  lg:w-10/12 grow-0">
                <header class="z-[5] items-center w-full h-16 bg-white shadow-lg -700 rounded-2xl">
                    <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
                        <div class="relative flex items-center w-full pl-1 lg:max-w-68 sm:pr-2 sm:ml-0">
                            <div class=" relative left-0 z-50 flex w-3/4 ">

                                {{ $secondbar ?? '' }}

                            </div>
                            <div class="relative flex items-center justify-end gap-2 w-1/4 p-1 ml-5 mr-4 sm:mr-0 sm:right-auto">

                                {{ $rightbar ?? '' }}
                                <span class="w-1 h-8 bg-gray-200 rounded-lg">
                                </span>


                                <div class="flex justify-center">

                                    <div x-data="{
                                        open: false,
                                        toggle() {
                                            if (this.open) {
                                                return this.close()
                                            }
                                    
                                            this.$refs.button.focus()
                                    
                                            this.open = true
                                        }
                                    }" class="relative">
                                        <!-- Button -->
                                        <button x-ref="button" x-on:click="open=!open" :aria-expanded="open" type="button" class="flex items-center gap-2 bg-white rounded-full shadow">
                                            <img alt="profil" src="{" class="mx-auto object-cover rounded-full h-10 w-10 " />

                                        </button>

                                        <!-- Panel -->
                                        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;" class="absolute right-[-50px] shadow-xl border mt-2 w-40 rounded-md bg-white shadow-md">
                                            <div class="border-b flex items-center gap-2 w-full rounded-t-md  px-4 py-2.5 text-left text-lg ">
                                                <x-svgs name="employee" class="w-6 mb-1" />
                                                <div class="grid h-fit space-y-[-13px]">
                                                    <span class="text-[15px]">Name</span>
                                                    
                                                </div>
                                            </div>


                                           

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <x-successflash />
                <x-errorflash />
                <x-comErrFlash />

                <div class="h-[85vh] overflow-auto w-full  pb-[5rem] ">
                    {{ $slot }}
                </div>


            </div>

        </div>

    </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

</body>

</html>