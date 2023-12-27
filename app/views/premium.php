<?php

require("../app/controllers/Premium.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-gray-100">

        <div class="h-screen flex  bg-gray-200">
            <!-- Sidebar -->
            <div class=" bg-gray-800 text-white w-56 min-h-screen" id="sidebar">
                <!-- Your Sidebar Content -->
                <div class="p-4">
                    <h1 class="text-2xl font-semibold">Sidebar</h1>
                    <ul class="mt-4">
                        <li class="mb-2"><a href="insurer.php" class="block hover:text-indigo-400">Insurer</a></i>
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

                    <form action="../app/controllers/Premium.php" method="post" class="mb-8">
                        <input type="hidden" name="action" value="addPremium">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700">amount</label>
                                <input type="text" name="amount" id="amount" placeholder="Enter amount"
                                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <label for="date" class="block text-sm font-medium text-gray-700">date</label>
                                <input type="text" name="date" id="date" placeholder="Enter date"
                                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                <label for="claim_id" class="block text-sm font-medium text-gray-700">claim_id</label>
                                <input type="text" name="claim_id" id="claim_id" placeholder="Enter claim_id"
                                    class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            </div>
                            <!-- Repeat similar structure for other input fields -->
                        </div>
                        <button type="submit" name="submit"
                            class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
                    </form>

                    <br>

                    <table class="min-w-full bg-white border border-gray-300 rounded-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">amount</th>
                                <th class="py-2 px-4 border-b">date</th>
                                <th class="py-2 px-4 border-b">claim_id</th>
                                <!-- Repeat for other headers -->
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($premiums as $premium): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b">
                                        <?= $premium['id'] ?>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <?= $premium['amount'] ?>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <?= $premium['date'] ?>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <?= $premium['claim_id'] ?>
                                    </td>


                                    <!-- Repeat for other data fields -->
                                    <td class="py-2 px-4 border-b">

                                        <form action="../app/controllers/Premium.php" method="post" class="ml-2">
                                            <input type="hidden" name="delete_id" value="<?= $premium['id'] ?>">
                                            <input type="hidden" name="action" value="deletePremium">
                                            <button type="submit" name="delete"
                                                class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600"
                                                onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                                        </form>
                                        <button class="bg-yellow-500 text-white py-1 px-2 rounded-md"
                                            onclick="toggleEditForm('<?= $premium['id'] ?>')">Edit</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- Edit Premium Form -->
                    <?php foreach ($premiums as $premium): ?>
                        <form action="../app/controllers/Premium.php" method="post" class="flex items-center space-x-2 mt-4" id="editForm<?= $premium['id'] ?>" style="display: none;">
                            <input type="hidden" name="action" value="editPremium">
                            <input type="hidden" name="id" value="<?= $premium['id'] ?>">
                            <input type="text" name="amount" value="<?= $premium['amount'] ?>"class="p-1 border border-gray-300 rounded-md" >
                            <input type="text" name="date" value="<?= $premium['date'] ?>"class="p-1 border border-gray-300 rounded-md">
                            <input type="text" name="claim_id" value="<?= $premium['claim_id'] ?>"class="p-1 border border-gray-300 rounded-md">
                            <button type="submit" name="edit" class="bg-green-500 text-white py-1 px-2 rounded-md hover:bg-green-600" onclick="return confirm('Are you sure you want to edit this premium?')">Edit</button>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleEditForm(premiumID) {
            const editForm = document.getElementById(`editForm${premiumID}`);
            const currentDisplay = editForm.style.display;
            editForm.style.display = currentDisplay === 'block' ? 'none' : 'block';
        }
    </script>













    </div>
</body>

</html>