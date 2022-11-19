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
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <link rel="stylesheet" href="style.css">
    <!-- tailwindcss CND -->

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- fontawsome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

    <title>To Do List</title>
    <style>

    </style>
</head>

<body>
    <!-- ADD A TODO -->
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
                                <tbody>
                                    <?php

                                    foreach ($get_todo as $todo) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="flex pt-2.5 font-medium">
                                                <div class="flex items-center w-full rounded-lg mr-2 ">
                                                    <?php
                                        if ($todo['status'] == 1) { ?>
                                                    <div
                                                        class="bg-[#ecfdf3]  border-2 border-[#d0d5dd] flex items-center w-full p-2.5 rounded-lg py-3">
                                                        <a href="index.php?id=<?= $todo['id'] ?>&status=undone"
                                                            class="text-[#12b76a] text-2xl mr-1.5"><i
                                                                class="fa-regular fa-circle-check"></i></a>

                                                        <?= $todo['todo']; ?>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div
                                                        class="bg-white  border-2 border-[#d0d5dd] flex items-center w-full p-2.5 rounded-lg py-3">
                                                        <a href="index.php?id=<?= $todo['id'] ?>&status=done"
                                                            class="text-2xl mr-1.5 text-[#344054]"><i
                                                                class="fa-regular fa-circle-check"></i></a>
                                                        <?= $todo['todo']; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>



                                                <div
                                                    class="flex items-center border-2 border-[#d0d5dd] p-2.5 px-16 py-3 rounded-lg mr-2">
                                                    <a href="edit.php?id=<?= $todo['id']; ?>" class="">Edit</a>
                                                </div>


                                                <section class="button-section">
                                                    <div
                                                        class="flex items-center border-2 border-[#f04438] p-2.5 px-12 py-3 rounded-lg bg-[#f04438]">
                                                        <button class="open-modal"><i
                                                                class="fa-regular fa-trash-can text-white text-xl"></i></button>
                                                    </div>
                                                </section>

                                                <aside id="modal-overlay" class="hidden w-full h-screen ">
                                                    <section id="modal-content">
                                                        <div class="flex justify-end">
                                                            <button class="close-modal font-bold">&#10005;</button>
                                                        </div>
                                                        <div class="flex justify-start  ml-4">
                                                            <div class="mb-12 flex items-center justify-center">
                                                                <div
                                                                    class="w-16 h-16 bg-[#fef3f2] rounded-full absolute p-6">
                                                                </div>
                                                                <div
                                                                    class="w-12 h-12 bg-[#fee4e2] rounded-full absolute ">
                                                                </div>
                                                                <p class="z-10 text-[#d92d20]"><i
                                                                        class="fa-regular fa-trash-can"></i></p>

                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <p class="mb-3">Delete Task</p>
                                                            <p class="text-[#667085] mb-8">Are you sure you want to
                                                                delete this task? This action cannot be undone.</p>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <div
                                                                class="w-44 py-2 flex justify-center bg-white border-2 border-[#d0d5dd] rounded-lg pr-2">
                                                                <button>
                                                                    <a href="#"
                                                                        class="close-modal no-underline">Cancle</a>
                                                                </button>
                                                            </div>

                                                            <div
                                                                class="w-44 py-2 flex justify-center bg-[#d92d20] rounded-lg">
                                                                <button>
                                                                    <a href="index.php?id=<?= $todo['id']; ?>&action=delete"
                                                                        class="text-white no-underline">Delete</a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </aside>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <script src="app.js"></script>

                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="tab">
                        <input type="radio" name="tabgroup" id="tab-2">
                        <label for="tab-2" class="px-12 py-2.5 rounded-lg ">Completed</label>
                        <div class="tab__content mt-2">
                            <table class="w-full">

                                <tbody>

                                    <?php
                                foreach (compitedTodo() as $todo) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="flex pt-2.5 font-medium">
                                                <div class="flex items-center w-full rounded-lg mr-2 ">
                                                    <?php
                                                if ($todo['status'] == 1) { ?>
                                                    <div
                                                        class="bg-[#ecfdf3]  border-2 border-[#d0d5dd] flex items-center w-full p-2.5 rounded-lg py-3">
                                                        <a href="index.php?id=<?= $todo['id'] ?>&status=undone"
                                                            class="text-[#12b76a] text-2xl mr-1.5"><i
                                                                class="fa-regular fa-circle-check"></i></a>

                                                        <?= $todo['todo']; ?>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div
                                                        class="bg-white  border-2 border-[#d0d5dd] flex items-center w-full p-2.5 rounded-lg py-3">
                                                        <a href="index.php?id=<?= $todo['id'] ?>&status=done"
                                                            class="text-2xl mr-1.5 text-[#344054]"><i
                                                                class="fa-regular fa-circle-check"></i></a>
                                                        <?= $todo['todo']; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>



                                                <div
                                                    class="flex items-center border-2 border-[#d0d5dd] p-2.5 px-16 py-3 rounded-lg mr-2">
                                                    <a href="edit.php?id=<?= $todo['id']; ?>" class="">Edit</a>
                                                </div>


                                                <section class="button-section">
                                                    <div
                                                        class="flex items-center border-2 border-[#f04438] p-2.5 px-12 py-3 rounded-lg bg-[#f04438]">
                                                        <button class="open-modal1"><i
                                                                class="fa-regular fa-trash-can text-white text-xl"></i></button>
                                                    </div>
                                                </section>

                                                <aside id="modal-overlay1" class="hidden w-full h-screen ">
                                                    <section id="modal-content">
                                                        <div class="flex justify-end">
                                                            <button class="close-modal1 font-bold">&#10005;</button>
                                                        </div>
                                                        <div class="flex justify-start  ml-4">
                                                            <div class="mb-12 flex items-center justify-center">
                                                                <div
                                                                    class="w-16 h-16 bg-[#fef3f2] rounded-full absolute p-6">
                                                                </div>
                                                                <div
                                                                    class="w-12 h-12 bg-[#fee4e2] rounded-full absolute ">
                                                                </div>
                                                                <p class="z-10 text-[#d92d20]"><i
                                                                        class="fa-regular fa-trash-can"></i></p>

                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <p class="mb-3">Delete Task</p>
                                                            <p class="text-[#667085] mb-8">Are you sure you want to
                                                                delete this task? This action cannot be undone.</p>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <div
                                                                class="w-44 py-2 flex justify-center bg-white border-2 border-[#d0d5dd] rounded-lg pr-2">
                                                                <button>
                                                                    <a href="#"
                                                                        class="close-modal1 no-underline">Cancle</a>
                                                                </button>
                                                            </div>

                                                            <div
                                                                class="w-44 py-2 flex justify-center bg-[#d92d20] rounded-lg">
                                                                <button>
                                                                    <a href="index.php?id=<?= $todo['id']; ?>&action=delete"
                                                                        class="text-white no-underline">Delete</a>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </section>
                                                </aside>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    <script src="app1.js"> </script>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="tab">
                        <input type="radio" name="tabgroup" id="tab-3">
                        <label for="tab-3" class="px-12 py-2.5 rounded-lg ">Incompleted</label>
                        <div class="tab__content mt-2">
                            <table class="w-full">
                                <tbody>
                                    <?php
                                    foreach (incompitedTodo() as $todo) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="flex pt-2.5 font-medium">
                                                <div class="flex items-center w-full rounded-lg mr-2 ">
                                                    <?php
                                        if ($todo['status'] == 1) { ?>
                                                    <div
                                                        class="bg-[#ecfdf3]  border-2 border-[#d0d5dd] flex items-center w-full p-2.5 rounded-lg py-3">
                                                        <a href="index.php?id=<?= $todo['id'] ?>&status=undone"
                                                            class="text-[#12b76a] text-2xl mr-1.5"><i
                                                                class="fa-regular fa-circle-check"></i></a>

                                                        <?= $todo['todo']; ?>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div
                                                        class="bg-white  border-2 border-[#d0d5dd] flex items-center w-full p-2.5 rounded-lg py-3">
                                                        <a href="index.php?id=<?= $todo['id'] ?>&status=done"
                                                            class="text-2xl mr-1.5 text-[#344054]"><i
                                                                class="fa-regular fa-circle-check"></i></a>
                                                        <?= $todo['todo']; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>



                                                <div
                                                    class="flex items-center border-2 border-[#d0d5dd] p-2.5 px-16 py-3 rounded-lg mr-2">
                                                    <a href="edit.php?id=<?= $todo['id']; ?>" class="">Edit</a>
                                                </div>

                                                <section class="button-section">
                                                    <div
                                                        class="flex items-center border-2 border-[#f04438] p-2.5 px-12 py-3 rounded-lg bg-[#f04438]">
                                                        <button class="open-modal2"><i
                                                                class="fa-regular fa-trash-can text-white text-xl"></i></button>
                                                    </div>
                                                </section>

                                                <aside id="modal-overlay2" class="hidden w-full h-screen ">
                                                    <section id="modal-content">
                                                        <div class="flex justify-end">
                                                            <button class="close-modal2 font-bold">&#10005;</button>
                                                        </div>
                                                        <div class="flex justify-start  ml-4">
                                                            <div class="mb-12 flex items-center justify-center">
                                                                <div
                                                                    class="w-16 h-16 bg-[#fef3f2] rounded-full absolute p-6">
                                                                </div>
                                                                <div
                                                                    class="w-12 h-12 bg-[#fee4e2] rounded-full absolute ">
                                                                </div>
                                                                <p class="z-10 text-[#d92d20]"><i
                                                                        class="fa-regular fa-trash-can"></i></p>

                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <p class="mb-3">Delete Task</p>
                                                            <p class="text-[#667085] mb-8">Are you sure you want to
                                                                delete this task? This action cannot be undone.</p>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <div
                                                                class="w-44 py-2 flex justify-center bg-white border-2 border-[#d0d5dd] rounded-lg pr-2">
                                                                <button>
                                                                    <a href="#"
                                                                        class="close-modal2 no-underline">Cancle</a>
                                                                </button>
                                                            </div>

                                                            <div
                                                                class="w-44 py-2 flex justify-center bg-[#d92d20] rounded-lg">
                                                                <button>
                                                                    <a href="index.php?id=<?= $todo['id']; ?>&action=delete"
                                                                        class="text-white no-underline">Delete</a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </aside>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <script src="app2.js"> </script>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- END A TODO -->

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

        // get tallest tab__content element
        let height = -1;

        $('.tab__content').each(function () {
            height = height > $(this).outerHeight() ? height : $(this).outerHeight();
            $(this).css('position', 'absolute');
        });

        // set height of tabs + top offset
        $('[data-tabs]').css('min-height', height + 40 + 'px');

    }(jQuery, document));
</script>