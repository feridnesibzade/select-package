<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dynamic Select</title>
    <style>
        .custom-select {
            position: relative;
            width: 200px;
            font-family: Arial;
        }

        .select-input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        .select-dropdown {
            position: absolute;
            width: 100%;
            background-color: white;
            border: 1px solid #ccc;
            border-top: none;
            max-height: 120px;
            /* Adjust height as necessary */
            overflow-y: auto;
            z-index: 1000;
        }

        .option {
            padding: 8px;
            cursor: pointer;
        }

        .option:hover {
            background-color: #f0f0f0;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    {{-- <Form:select> --}}

    {{-- <Form:grid>
        <Form:col :col="2">
            <Form:select :name=""></Form:select>
        </Form:col>
        <Form:col :col="2">
            <Form:text :name=""></Form:text>
        </Form:col>
    </Form:grid> --}}

    <select name="example1" id="example1" placeholder="Select Example">

    </select>
    // --------------------------------------------------
    //1. Blade componenet yarat
    //2. option-lari dynamic
    //3. Blade componentine name- dynamic oturesen (id, classname, option classname, option selected)
    //*. option complex bir component olsun

    // --------------------------------------------------
    // register as blade directive

    //---------------------------------------------------
    // extract as a package
    <select name="example2" id="example2" placeholder="Test">
        <option value="s">2</option>
        <option value="s">3</option>
        <option value="s">4</option>
        <option value="s">5</option>
    </select>

    // Select::make()->name('first-ever-select')->id('i-d-know')->option([])->className()
    // @select()->name('first-ever-select')->id('i-d-know')->option([])->className()
    // <x->

    //--------------------------------------------------
    // Factory pattern. 
    // 1. oxu-oyren, 
    // 2. laravelde bunun numunesi
    //Design pattern category
    // 1. Creational
    // 2. Behavioral
    // 3. Sturctural
    //    Decorator- wrapper

    // Laravel Life cycle

    <script>
        $('#example2').select2()
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", (event) => {

            let selectElement = document.getElementById('example1');
            changeContentOfSelect(selectElement)

            selectElement.addEventListener('click', function(event) {
                appendToSelect(this)
            })
        });

        function appendToSelect(selectElement) {
            changeContentOfSelect(selectElement, 'Loading...')
            getData().then((e) => {
                changeContentOfSelect(selectElement)
                const data = e;
                data.result.forEach(item => {
                    let option = document.createElement('option');
                    option.value = item.values;
                    option.textContent = item.text;
                    selectElement.appendChild(option);
                });
            }).catch((e) => {
                changeContentOfSelect(selectElement, 'Error happend!');
            });
        }


        async function getData() {
            const url = "{{ route('select-mock') }}";
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }
                const json = await response.json();
                return json;
            } catch (error) {
                throw error
            }
        }

        function changeContentOfSelect(selectElement, value = "") {
            selectElement.innerHTML = null;
            selectElement.innerHTML =
                `<option value="" hidden default selected>${selectElement.getAttribute('placeholder')}</option>`;
            if (value) {
                selectElement.innerHTML += `<option disabled>${value}</option>`;
            }
        }
    </script>
    @stack('foot')
</body>

</html>
