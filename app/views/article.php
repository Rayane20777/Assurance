<?php

        require("../app/controllers/Article.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">

</head>
<body>
<div class="bg-gray-100">

<div class="h-screen flex  bg-gray-200">
        <!-- Sidebar -->
        <div class=" bg-gray-800 text-white w-56 min-h-screen"
            id="sidebar">
            <!-- Your Sidebar Content -->
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Sidebar</h1>
                <ul class="mt-4">
                    <li class="mb-2"><a href="insurer.php" class="block hover:text-indigo-400">Insurer</a></li>
                    <li class="mb-2"><a href="client.php" class="block hover:text-indigo-400">Client</a></li>
                    <li class="mb-2"><a href="article.php" class="block hover:text-indigo-400">Article</a></li>
                    <li class="mb-2"><a href="claim.php" class="block hover:text-indigo-400">Claim</a></li>
                    <li class="mb-2"><a href="premium.php" class="block hover:text-indigo-400">Premium</a></li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <div class="bg-white shadow">
                <div class="container mx-auto">
                    <div class="flex justify-between items-center py-4 px-2">
                        <h1 class="text-xl font-semibold">Animated Drawer</h1>
                    </div>
                </div>
            </div>
            <!-- Content Body -->
            <div class="flex-1 overflow-auto p-4">
    <h1 class="text-3xl font-bold mb-8">Welcome to our website</h1>

    <form action="../app/controllers/Article.php" method="post" class="mb-8">
    <input type="hidden" name="action" value="addArticle">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" placeholder="Enter Title"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <input type="text" name="content" id="content" placeholder="Enter Content"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="text" name="date" id="date" placeholder="Enter Date"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
        <div>
            <label for="insurer_id" class="block text-sm font-medium text-gray-700">Insurer ID</label>
            <input type="text" name="insurer_id" id="insurer_id" placeholder="Enter Insurer ID"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
        <div>
            <label for="client_id" class="block text-sm font-medium text-gray-700">Client ID</label>
            <input type="text" name="client_id" id="client_id" placeholder="Enter Client ID"
                class="mt-1 p-2 border border-gray-300 rounded-md w-full">
        </div>
    </div>
    <button type="submit" name="submit"
        class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
</form>


    <br>

    <table id="example" class="display" style="width:100%; border-collapse: collapse;" class="min-w-full bg-white border border-black rounded-md">
    <thead style="background-color: #1a5276; color: #ffffff;">
        <tr>
            <th class="py-2 px-4 border-b border-black">ID</th>
            <th class="py-2 px-4 border-b border-black">title</th>
            <th class="py-2 px-4 border-b border-black">content</th>
            <th class="py-2 px-4 border-b border-black">date</th>
            <th class="py-2 px-4 border-b border-black">insurer_id</th>
            <th class="py-2 px-4 border-b border-black">client_id</th>
            <!-- Repeat for other headers -->
            <th class="py-2 px-4 border-b border-black">Actions</th>
            <th class="py-2 px-4 border-b border-black">View Claims</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;"><?= $article['id'] ?></td>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;"><?= $article['title'] ?></td>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;"><?= $article['content'] ?></td>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;"><?= $article['date'] ?></td>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;"><?= $article['insurer_id'] ?></td>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;"><?= $article['client_id'] ?></td>
                

                <td class="py-1 px-4 border-b border-black" style="line-height: 1;">

                    <form action="../app/controllers/Article.php" method="post" class="ml-2">
                        <input type="hidden" name="delete_id" value="<?= $article['id'] ?>">
                        <input type="hidden" name="action" value="deleteArticle">
                        <button type="submit" name="delete" class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                    </form>
                    <button class="bg-yellow-500 text-white py-1 px-2 rounded-md" onclick="toggleEditForm('<?= $article['id'] ?>')">Edit</button>

                </td>
                <td class="py-1 px-4 border-b border-black" style="line-height: 1;">
                <button class="bg-blue-500 text-white py-1 px-2 rounded-md" onclick="viewClaims('<?= $article['id'] ?>')">View Claims</button>
            </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <?php foreach ($articles as $article): ?>
    <form action="../app/controllers/Article.php" method="post" class="flex items-center space-x-2 mt-4" id="editForm<?= $article['id'] ?>" style="display: none;">
        <input type="hidden" name="action" value="editArticle">
        <input type="hidden" name="id" value="<?= $article['id'] ?>">
        <input type="text" name="title" value="<?= $article['title'] ?>" class="p-1 border border-gray-300 rounded-md">
        <input type="text" name="content" value="<?= $article['content'] ?>" class="p-1 border border-gray-300 rounded-md">
        <input type="text" name="date" value="<?= $article['date'] ?>" class="p-1 border border-gray-300 rounded-md">
        <input type="text" name="insurer_id" value="<?= $article['insurer_id'] ?>" class="p-1 border border-gray-300 rounded-md">
        <input type="text" name="client_id" value="<?= $article['client_id'] ?>" class="p-1 border border-gray-300 rounded-md">
    <button type="submit" name="edit" class="bg-green-500 text-white py-1 px-2 rounded-md hover:bg-green-600" onclick="return confirm('Are you sure you want to edit this address?')">Edit</button>
    <?php endforeach; ?>
</form>
</div>
</div>
        </div>
    </div>

    <script>
    function toggleEditForm(articleID) {
        const editForm = document.getElementById(`editForm${articleID}`);
        const currentDisplay = editForm.style.display;
        editForm.style.display = currentDisplay === 'block' ? 'none' : 'block';
    }
   

</script>
<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js" ></script>
<script>
    new DataTable('#example');
</script>








    



</div>
</body>
</html>

