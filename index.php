<?php
require 'functions.php';

$get_todo = getTodo();

if (isset($_GET['status']) && $_GET['id']) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    if ($_GET['status'] === 'undone') {
        changeStatus($id, $status);
    }
    if ($_GET['status'] === 'done') {
        changeStatus($id, $status);
    }
} else {
?>
<script>window.href.location = 'index.php';</script>
<?php
}

if (isset($_GET['action']) && $_GET['id']) {
    $id = $_GET['id'];
    if ($_GET['action'] === 'delete') {
        delete($id);
    }
} else {
?>
<script>window.href.location = 'index.php';</script>

<?php

}
if (isset($_POST['todo_submit'])) {
    createTodo($_POST);
    header('location: index2.php');
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.tailwindcss.com"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

    <title>To Do List</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="index.php" method="POST">
                    <div class="d-flex align-items-center justify-content-between mt-10">
                        <input type="text" class="w-full border border-black p-3 rounded-lg " name="todo"
                            placeholder="Write you task here...">
                        <button type="submit" name="todo_submit"
                            class="float-right bg-[#12b76a] px-24 ml-4 py-3 rounded-lg text-white">Create</button>
                    </div>
                </form>


                <div data-tabs class="tabs">

                    <div class="tab">
                        <input type="radio" name="tabgroup" id="tab-1" checked>
                        <label for="tab-1" class="px-12 py-2.5 rounded-lg">All</label>
                        <div class="tab__content mt-2">
                            <table class="w-full">
                                    <div class="h-96 mt-20 flex flex-col justify-center items-center">
                                        <p class="text-2xl mb-8" style="font-weight: 500;">You don`t  have anything created!</p>
                                            <div class="border-2 border-black w-28 h-28 rounded-full" style="opacity: 0.5;">
                                                <i class="fa fa-plus flex items-center justify-center " style="font-size:35px; margin-top: 35px; margin-left: -3px;"></i>
                                            </div>
                                        <p class="text-2xl mt-3" style="color: #344054; opacity: 0.5; font-weight: 500;">Create Task</p>
                                    </div>
                                    <script src="app.js"></script>
                            </table>
                        </div>
                    </div>



                    <div class="tab">
                        <input type="radio" name="tabgroup" id="tab-2">
                        <label for="tab-2" class="px-12 py-2.5 rounded-lg ">Completed</label>
                        <div class="tab__content mt-2">
                            <table class="w-full">
                            <div class="h-96 mt-20 flex flex-col justify-center items-center">
                                        <p class="text-2xl mb-8" style="font-weight: 500;">You don`t  have anything created!</p>
                                            <div class="border-2 border-black w-28 h-28 rounded-full" style="opacity: 0.5;">
                                                <i class="fa fa-plus flex items-center justify-center " style="font-size:35px; margin-top: 35px; margin-left: -3px;"></i>
                                            </div>
                                        <p class="text-2xl mt-3" style="color: #344054; opacity: 0.5; font-weight: 500;">Create Task</p>
                                    </div>
                                    <script src="app1.js"> </script>
                            </table>
                        </div>
                    </div>


                    <div class="tab">
                        <input type="radio" name="tabgroup" id="tab-3">
                        <label for="tab-3" class="px-12 py-2.5 rounded-lg ">Incompleted</label>
                        <div class="tab__content mt-2">
                            <table class="w-full">
                            <div class="h-96 mt-20 flex flex-col justify-center items-center">
                                        <p class="text-2xl mb-8" style="font-weight: 500;">You don`t  have anything created!</p>
                                            <div class="border-2 border-black w-28 h-28 rounded-full" style="opacity: 0.5;">
                                                <i class="fa fa-plus flex items-center justify-center " style="font-size:35px; margin-top: 35px; margin-left: -3px;"></i>
                                            </div>
                                        <p class="text-2xl mt-3" style="color: #344054; opacity: 0.5; font-weight: 500;">Create Task</p>
                                    </div>
                                    <script src="app2.js"> </script>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>


</body>

</html>

<script>

    (function ($, document) {
        let height = -1;

        $('.tab__content').each(function () {
            height = height > $(this).outerHeight() ? height : $(this).outerHeight();
            $(this).css('position', 'absolute');
        });

        $('[data-tabs]').css('min-height', height + 40 + 'px');

    }(jQuery, document));
</script>