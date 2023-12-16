<?php

require_once('../app/functions.php');

?>

<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neue Zählung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <link rel="stylesheet" href="assets/css/mobile.css">
</head>
<body class="flex flex-col h-screen">
    <div class="head px-6">
        <div class="top flex justify-between pt-10">
            <h3 class="font-semibold text-[16px] py-2">Neue Zählung</h3>
            <img src="assets/images/logo.svg" alt="Logo" class="w-8 h-8">
        </div>
    </div>

    <div class="app mt-6 mb-auto px-6">
        <div class="scan flex justify-between w-full mt-3">
            <button id="scan" class="h-[40px] w-[120px] rounded-full bg-neutral-800 text-white font-semibold">Scan</button>
            <p class="py-2 font-medium">Datum : <span id="datum"></span></p>
        </div>
        <div id="interactive">
            <div id="closeCam" class="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <form action="app/process.php" method="post">
            <h3 class="title text-[20px] font-semibold mt-6">Lagerung</h3>
            <div id="items" method="POST" action="app/process.php">
                <div id="placeholder" class="grid place-items-center w-full h-[70px] text-gray-500">
                    <h4>Produkte hinzufügen oder scannen</h4>
                </div>
            </div>
            <div class="flex justify-between gap-x-2">
                <button type="button" id="product" onclick="addProduct()" class="grid place-items-center mt-3 py-3 px-3 rounded-full bg-neutral-800/90 shadow-md shadow-neutral-400 text-white font-semibold mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>                  
                </button>
                <button type="submit" name="addCount" class="grid place-items-center mt-3 py-2.5 w-full rounded-full bg-yellow-400 shadow-md shadow-yellow-300 text-white font-semibold mt-5">Beenden Sie das Zählen</button>
            </div>
        </form>
    </div>
    <div class="navigation h-[85px] border border-gray-200 w-full flex justify-between items-center px-14">
        <a href="." class="text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
            </svg>              
        </a>
        <a href="create" class="text-yellow-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
            </svg>
        </a>
        <a href="counts" class="text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/counting.js" type="text/javascript"></script>
</body>
</html>