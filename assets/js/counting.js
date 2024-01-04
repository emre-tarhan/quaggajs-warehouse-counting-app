function attachDeleteEventListeners() {
    var deleteRow = document.querySelectorAll('[data-delete="row"]');
    
    deleteRow.forEach(function (button) {
        button.addEventListener('click', function () {
            var rowToDelete = button.closest('.flex');

            if (rowToDelete) {
                rowToDelete.remove();
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    updateDate();
    attachDeleteEventListeners();
    var startButton = document.getElementById('scan');
    var closeButton = document.getElementById('closeCam');
    var scannerIsRunning = false;
    
    startButton.addEventListener('click', function() {
        if (!scannerIsRunning) {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#interactive')
                },
                decoder: {
                    readers: ["ean_reader"]
                }
            }, function (err) {
                if (err) {
                    console.log(err);
                    return
                }
                console.log("Initialization finished. Ready to start");
                Quagga.start();
                scannerIsRunning = true;
            });
        }
        document.getElementById('interactive').style.display = 'block';
        closeButton.classList.remove('hidden');
    });
    
    closeButton.addEventListener('click', function() {
        Quagga.stop();
        document.getElementById('interactive').style.display = 'none';
        closeButton.classList.add('hidden');
        scannerIsRunning = false;
    });
    
    Quagga.onDetected(function(result) {
        if (document.getElementById('placeholder')) {
            placeholder.remove();
        }
        
        var code = result.codeResult.code;
        // console.log(code);
        var itemsDiv = document.getElementById('items');
        var newItem = document.createElement('div');
            
        newItem.className = 'flex mt-2 items-center justify-between gap-x-4 px-5 w-auto h-[50px] bg-gray-50 rounded-lg shadow-sm shadow-gray-200';
        placeholder.remove();
        
        newItem.innerHTML = `
            <input type="text" name="barcode[]" value="${code}" class="rounded-md w-[180px] px-2 py-0.5">
            <input type="number" name="qty[]" class="rounded-md w-[70px] px-2 py-0.5">
                <button type="button" data-delete="row">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-neutral-800">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
            </button>
        `;
    
        itemsDiv.appendChild(newItem);
        Quagga.stop();
        attachDeleteEventListeners();
    });
});


function updateDate() {
    var today = new Date();

    var formattedDate = addLeadingZero(today.getDate()) + '.' +
                        addLeadingZero(today.getMonth() + 1) + '.' +
                        today.getFullYear();

    document.getElementById('datum').textContent = formattedDate;
}

function addLeadingZero(number) {
    return (number < 10 ? '0' : '') + number;
}

function addProduct() {
    var itemsDiv = document.getElementById('items');
    var placeholder = document.getElementById('placeholder');
    var newItem = document.createElement('div');
    newItem.className = 'flex mt-2 items-center justify-between gap-x-4 px-5 w-auto h-[50px] bg-gray-50 rounded-lg shadow-sm shadow-gray-200';
    if(placeholder) {placeholder.remove()};
    
    newItem.innerHTML = `
        <input type="text" name="barcode[]" class="rounded-md w-[180px] px-2 py-0.5">
        <input type="number" name="qty[]" class="rounded-md w-[70px] px-2 py-0.5">
        <button type="button" data-delete="row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-neutral-800">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
        </button>
    `;

    itemsDiv.appendChild(newItem);
    attachDeleteEventListeners();
}
