@props([
    'name' => 'example1',
    'id' => null,
    'placeholder' => 'Select Example',
    'options' => null,
    'url' => null,
    'class' => null,
])

<select {{ $attributes->merge(['class' => ' ' . $class]) }} name="{{ $name }}" id="{{ $id ?? $name }}"
    placeholder="{{ $placeholder }}">

</select>

@push('foot')
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
            try {
                const response = await fetch('{{ $url }}');
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
@endpush
