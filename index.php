<?php

require_once('app/functions.php');

?>

<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startseite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/mobile.css">
</head>
<body class="flex flex-col h-screen">
    <div class="head px-6">
        <div class="top flex justify-between pt-10">
            <h3 class="font-semibold text-[16px] py-2">Überblick</h3>
            <img src="assets/images/logo.svg" alt="Logo" class="w-8 h-8">
        </div>
        <h3 class="font-semibold text-[36px] py-2">Hallo!</h3>
        <div class="buttons flex gap-x-2">
            <a href="#" class="w-[120px] text-[16px] font-medium text-center text-white bg-yellow-400 rounded-full py-1 px-3 items-center hover:bg-yellow-400/70 transitions-all duration-300 shadow-sm blur blur-[2px]">Kalender</a>
            <a href="counts" class="w-[120px] text-[16px] font-medium text-center text-gray-900 bg-gray-300/70 rounded-full py-1 px-3 items-center hover:bg-gray-300/60 transitions-all duration-300 shadow-sm">Berichte</a>
        </div>
    </div>

    <div class="app mt-6 mb-auto px-6">
        <div class="calendar-main mt-2 blur blur-[2px]">
            <div class="swiper-container" id="calendar-swiper">
                <div class="swiper-wrapper" id="calendar"></div>
            </div>
        </div>
        <a href="create" class="grid place-items-center mt-3 py-2.5 w-full rounded-full bg-yellow-400 text-white font-semibold mt-5">Zählen Sie heute</a>
        <h3 class="title text-[20px] font-semibold mt-6 blur blur-[2px]">Transaktionen</h3>
        <div class="options mt-2 grid grid-cols-2 grid-rows-2 gap-x-4 gap-y-3 blur blur-[3px]">
            <div class="option w-auto h-[140px] bg-gray-300/70 rounded-[24px] shadow-sm shadow-gray-300">
                <div class="icon w-[34px] h-[34px] text-white bg-yellow-400 rounded-[12px] mt-3 ml-3 grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875z" />
                        <path d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 001.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 001.897 1.384C6.809 12.164 9.315 12.75 12 12.75z" />
                        <path d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 15.914 9.315 16.5 12 16.5z" />
                        <path d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 19.664 9.315 20.25 12 20.25z" />
                      </svg>                      
                </div>

                <h4 class="text-gray-900 font-semibold text-[16px] mt-[25px] ml-3">
                    Counts
                </h4>
                <div class="bottom mt-[12px] ml-3 mr-3 flex justify-between">
                    <div class="w-[74px] h-[5px] mt-[8px] bg-white rounded-full">
                        <div class="w-[60px] h-[5px] bg-yellow-400 rounded-full"></div>
                    </div>
                    <div class="w-[48px] h-[21px] bg-yellow-400 text-white text-[10px] rounded-full grid place-items-center">
                        32/34
                    </div>
                </div>
            </div>
            <div class="option w-auto h-[140px] bg-gray-300/70 rounded-[24px] shadow-sm shadow-gray-300">
                <div class="icon w-[34px] h-[34px] text-white bg-yellow-400 rounded-[12px] mt-3 ml-3 grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z" clip-rule="evenodd" />
                    </svg>                                           
                </div>

                <h4 class="text-gray-900 font-semibold text-[16px] mt-[25px] ml-3">
                    Raports
                </h4>
                <div class="bottom mt-[12px] ml-3 mr-3 flex justify-between">
                    <div class="w-[74px] h-[5px] mt-[8px] bg-white rounded-full">
                        <div class="w-[25px] h-[5px] bg-yellow-400 rounded-full"></div>
                    </div>
                    <div class="w-[48px] h-[21px] bg-yellow-400 text-white text-[10px] rounded-full grid place-items-center">
                        4/18
                    </div>
                </div>
            </div>
            <div class="option w-auto h-[140px] bg-gray-300/70 rounded-[24px] shadow-sm shadow-gray-300">
                <div class="icon w-[34px] h-[34px] text-white bg-yellow-400 rounded-[12px] mt-3 ml-3 grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                        <path fill-rule="evenodd" d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>                                            
                </div>

                <h4 class="text-gray-900 font-semibold text-[16px] mt-[25px] ml-3">
                    Produkte
                </h4>
                <div class="bottom mt-[12px] ml-3 mr-3 flex justify-between">
                    <div class="w-[74px] h-[5px] mt-[8px] bg-white rounded-full">
                        <div class="w-[74px] h-[5px] bg-yellow-400 rounded-full"></div>
                    </div>
                    <div class="w-[48px] h-[21px] bg-yellow-400 text-white text-[10px] rounded-full grid place-items-center">
                        176/176
                    </div>
                </div>
            </div>
            <div class="option w-auto h-[140px] bg-gray-300/70 rounded-[24px] shadow-sm shadow-gray-300">
                <div class="icon w-[34px] h-[34px] text-white bg-yellow-400 rounded-[12px] mt-3 ml-3 grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                    </svg>                                            
                </div>

                <h4 class="text-gray-900 font-semibold text-[16px] mt-[25px] ml-3">
                    Kalender
                </h4>
                <div class="bottom mt-[12px] ml-3 mr-3 flex justify-between">
                    <div class="w-[74px] h-[5px] mt-[8px] bg-white rounded-full">
                        <div class="w-[32px] h-[5px] bg-yellow-400 rounded-full"></div>
                    </div>
                    <div class="w-[48px] h-[21px] bg-yellow-400 text-white text-[10px] rounded-full grid place-items-center">
                        7/18
                    </div>
                </div>
            </div>
        </div>
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
    <script type="module" src="assets/js/calendar.js"></script>
</body>
</html>