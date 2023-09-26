<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @livewireStyles
    <title>vw t2 Vin Descoder</title>
</head>

<body class="antialiased">

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="md:w-2/5 lg:w-3/5">

                <h2 class="sm:text-3xl text-2xl text-white font-medium title-font mb-2">VW T2 (1968-1979) Vin Decoder
                </h2>

                <div class="bus relative bus--full bus--top-white bus--bottom-love">
                    <div class="bus-body">
                        <div class="bus__body--top roof"></div>
                        <div class="bus__body--top side-top"></div>
                        <div class="bus__body--top side-top side-top--right"></div>
                        <div class="bus__body--top gutter"></div>
                        <div class="bus__body--top gutter gutter--right"></div>
                        <div class="bus__body--top mid-top"></div>
                        <div class="bus__body--top bump"></div>

                        <div class="bus__body--bottom front"></div>

                        <div class="bus__body--bottomx front-middle"></div>
                        <div class="bus__body--bottomx front-middle--bottom"></div>
                        <div class="bus__body--bottomx grill">
                            <div class="grill__hole"></div>
                            <div class="grill__hole grill__hole--right"></div>
                        </div>
                    </div>

                    <div class="mirrors">
                        <div class="mirror-l">
                            <div class="mirror-glass"></div>
                            <div class="mirror-arm"></div>
                        </div>
                        <div class="mirror-r">
                            <div class="mirror-glass"></div>
                            <div class="mirror-arm mirror-arm-r"></div>
                        </div>
                    </div>

                    <div class="windshield">
                        <div class="windshield-rubber"></div>
                        <div class="windshield-rubber--bottom"></div>
                        <div class="windshield-rubber--side"></div>
                        <div class="windshield-rubber--side windshield-rubber--side--right"></div>
                        <div class="windshield-top"></div>
                        <div class="windshield-bottom"></div>
                    </div>

                    <div class="front-parts">
                        <div class="wiper">
                            <div class="wiper-blade"></div>
                            <div class="wiper-arm"></div>
                            <div class="wiper-attachment"></div>
                        </div>
                        <div class="wiper wiper-left">
                            <div class="wiper-blade"></div>
                            <div class="wiper-arm"></div>
                            <div class="wiper-attachment"></div>
                        </div>

                        <div class="directional">
                            <div class="directional--off"></div>
                        </div>
                        <div class="directional directional--right">
                            <div class="directional--off"></div>
                        </div>

                        <div class="vw-logo vw-logo--shadow">
                            <span class="vw-logo__v"></span>
                            <span class="vw-logo__w">
                                <span class="vw-logo__w__leg-l"></span>
                                <span class="vw-logo__w__leg-r"></span>
                            </span>
                        </div>
                        <div class="vw-logo">
                            <span class="vw-logo__v"></span>
                            <span class="vw-logo__w">
                                <span class="vw-logo__w__leg-l"></span>
                                <span class="vw-logo__w__leg-r"></span>
                            </span>
                        </div>

                        <div class="headlight">
                            <div class="headlight--off">
                                <div class="headlight--off__star"></div>
                            </div>
                        </div>
                        <div class="headlight headlight--right">
                            <div class="headlight--off headlight--on--right">
                                <div class="headlight--off__star"></div>
                            </div>
                        </div>

                        <div class="bumper">
                            <div class="bumper-top"></div>
                            <div class="bumper-straight bs-middle"></div>
                            <div class="bumper-curve bc-1"></div>
                            <div class="bumper-straight bs-1"></div>
                            <div class="bumper-curve bc-2"></div>
                            <div class="bumper-curve bc-3"></div>
                            <div class="bumper-straight bs-3"></div>
                            <div class="bumper-curve bc-4"></div>
                            <div class="bus__body--bottom above-bumper"></div>
                        </div>
                    </div>

                    <div class="underbody">
                        <div class="tire"></div>
                        <div class="tire tire--right"></div>
                        <div class="mid-parts">
                            <div class="mid-parts--left"></div>
                            <div class="mid-parts--middle"></div>
                            <div class="mid-parts--left mid-parts--right"></div>
                        </div>
                        <div class="under-part-1l"></div>
                        <div class="under-part-1l under-part-1r"></div>
                        <div class="under-part-2"></div>
                        <div class="shock-l"></div>
                        <div class="shock-l shock-r"></div>
                        <div class="bar-l"></div>
                        <div class="bar-l bar-r"></div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <label class="mt-4" for="title">Select Color: </label>
                    <select name="colorSelector" id="colorSelector" class="sm:w-3/6 md:w-2/6 m-1 px-4 py-2"
                        onchange="bodyColor(this)">
                        @foreach ($colors as $color)
                            <option value="{{ $color->hex_code }}" @selected(old('color') == $color->hex_code)>
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="md:w-3/5 lg:w-2/5 lg:py-64 md:py-48 md:pl-6 sm:py-42">
                @livewire('vin-form')
            </div>
        </div>
    </section>

</body>
@vite('resources/js/app.js')
@livewireScripts

</html>
<script>
    function bodyColor(selector) {
        var selectedColor = selector.options[selector.selectedIndex].value;
        var element = document.querySelector('.bus__body--bottom');
        console.log(selectedColor);
        element.style.backgroundColor = selectedColor;
    }
</script>
