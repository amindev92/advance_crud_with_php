<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue-dark': '#0E4BE1',
                        'white': '#FFF',
                        'black': '#000',
                        'gray-dark': '#707070',
                        'gray-light-2': '#e6e5e5',
                        'gray-light': '#DDD',
                        'blue-light': '#4DA3FF',
                        'yellow-light': '#FFE6AC',
                        'purple-light': '#E7D1FC'
                    }
                },
                fontFamily: {
                    'roboto': ['Roboto'],
                }
            }
        }
    </script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/app.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title><?php echo SITE_TITLE; ?></title>
</head>

<body class="bg-gray-light-2 overflow-hidden">

    <nav class="fixed top-0 left-0 h-full w-1/4 p-8 bg-white">

        <div class="logo">

            <div class="logo__img w-16 mx-auto ">
                <img src="<?php echo BASE_URL; ?>assets/img/logo.jpg" class="w-full h-full object-contain">
            </div>

            <div class="logo__title">
                <h1 class="font-Roboto text-3xl text-center mt-6 font-medium ">Task Manager</h1>
            </div>

        </div>

        <div class="nav-menu">

            <div class="nav-menu__search mt-4">


                <form>
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>


            </div>

            <div class="w-full mt-12 text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white folderList">
                <?php foreach ($folders as $folder) : ?>
                    <div class="relative folderItem inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                        <a class="cursor-pointer <?php echo (isset($_GET["folder_id"]) and $_GET["folder_id"] == $folder->id) ? 'active' : ''; ?>" href="?folder_id=<?php echo $folder->id; ?>">
                            <i class="fa fa-folder" aria-hidden="true" style="margin-right: 5px;"></i>
                            <?php echo $folder->name; ?>
                        </a>
                        <a href="?delete_folder=<?php echo $folder->id; ?>" style="margin-left: auto;">
                            <i class="fa fa-times" aria-hidden="true">X</i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="nav-menu__addTask  mt-4">

                <form>
                    <label for="addFolder" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">addFolder</label>
                    <div class="relative">

                        <input type="text" id="addFolderInput" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="add" required>
                        <button type="submit" id="addFolderBtn" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            task</button>
                    </div>
                </form>

            </div>

        </div>

    </nav>

    <section class="taskManager relative left-1/4 h-screen pt-6 ">
        <div class="topMenu flex justify-between pl-14 pt-4 fixed top-0 w-4/6">
            <div class="topMenu__buttons">
                <button type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add
                    New Task</button>
                <button type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>

            </div>
            <div class="topMenu__img w-12">
                <img src="<?php echo BASE_URL; ?>assets/img/2.jpg" class="w-full h-full rounded-full">
            </div>
        </div>

        <div class="tasks flex flex-col items-center justify-center pt-4 w-full mt-24 mx-auto px-6">

            <h2 class="mb-4 text-xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-500 from-sky-400">Tasks List
                    :</span></h2>

            <ul class="grid w-full gap-6 md:grid-cols-3">
                <li>
                    <label for="angular-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Angular</div>
                            <div class="w-full text-sm">A TypeScript-based web application framework.</div>
                            <div class="task-status flex justify-between items-center w-full mt-4">
                                <div class="flex self-center">
                                    <input id="inline-checkbox" type="checkbox" value="" class="self-center w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ">
                                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                </div>

                                <button type="button" class=" basis-2/4 text-white bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Complete</button>

                            </div>
                        </div>
                    </label>
                </li>
                <li>
                    <label for="angular-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Angular</div>
                            <div class="w-full text-sm">A TypeScript-based web application framework.</div>
                            <div class="task-status flex justify-between items-center w-full mt-4">
                                <div class="flex self-center">
                                    <input id="inline-checkbox" type="checkbox" value="" class="self-center w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ">
                                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                </div>
                                <button type="button" class="basis-2/4 self-center text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">In
                                    Progress</button>
                            </div>
                        </div>
                    </label>
                </li>
                <li>
                    <label for="angular-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Angular</div>
                            <div class="w-full text-sm">A TypeScript-based web application framework.</div>
                            <div class="task-status flex justify-between items-center w-full mt-4">
                                <div class="flex self-center">
                                    <input id="inline-checkbox" type="checkbox" value="" class="self-center w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ">
                                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                </div>
                                <button type="button" class="basis-2/4 self-center text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">In
                                    Progress</button>
                            </div>
                        </div>
                    </label>
                </li>
                <li>
                    <label for="angular-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Angular</div>
                            <div class="w-full text-sm">A TypeScript-based web application framework.</div>
                            <div class="task-status flex justify-between items-center w-full mt-4">
                                <div class="flex self-center">
                                    <input id="inline-checkbox" type="checkbox" value="" class="self-center w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ">
                                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                </div>
                                <button type="button" class="basis-2/4 self-center text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">In
                                    Progress</button>
                            </div>
                        </div>
                    </label>
                </li>
                <li>
                    <label for="angular-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">Angular</div>
                            <div class="w-full text-sm">A TypeScript-based web application framework.</div>
                            <div class="task-status flex justify-between items-center w-full mt-4">
                                <div class="flex self-center">
                                    <input id="inline-checkbox" type="checkbox" value="" class="self-center w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ">
                                    <label for="inline-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                </div>
                                <button type="button" class="basis-2/4 self-center text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">In
                                    Progress</button>
                            </div>
                        </div>
                    </label>
                </li>
            </ul>

        </div>


    </section>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        var addFolderInput = $("#addFolderInput");
        var addFolderBtn = $("#addFolderBtn");
        addFolderBtn.click(function() {
            $.ajax({
              url: 'process/ajaxHandler.php',
              method: 'post',
              data:{
                action: 'addFolder',
                folderName: addFolderInput.val()
              },
              success:function(response){
                // alert(response);
                location.reload();
              }
            })
        });
    });
    
</script>

</body>

</html>