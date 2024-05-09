<?php require_once "../app/Views/Components/head.php"; ?>

<body class="bg-gray-100">
    <?php require_once "../app/Views/Components/navbar.php"; ?>

    <div class="h-screen">
        <div class="container mx-auto mt-8">
            <div class="mx-auto max-w-4xl rounded-lg bg-white p-6 shadow-lg md:max-w-screen-lg">
                <h1 class="text-3xl font-bold">FancyToDo Project</h1>
                <a href="/task" class="text-blue-500 ml-4">
                    <i class="fas fa-plus-circle"></i> Add Task
                </a>
            </div>

            <!-- Task listing -->
            <h2 class="text-2xl font-bold mb-2">Tasks:</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="text-left text-zinc-700">
                            <th class="pb-4">Task</th>
                            <th class="pb-4">Owner</th>
                            <th class="pb-4">Status</th>
                            <th class="pb-4">Deadline</th>
                            <th class="pb-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <td class="pb-2"><?php echo htmlspecialchars($task['Title']); ?></td>
                                <td class="pb-2"><?php echo htmlspecialchars($taskModel->getUsernameById($task['UserID'])); ?></td>
                                <td class="pb-2">
                                    <span class="rounded-full <?php echo ($task['Status'] === 'Pabeigts') ? 'bg-green-500' : 'bg-red-500'; ?> px-2 py-1 font-bold text-white">
                                        <?php echo htmlspecialchars($task['Status']); ?>
                                    </span>
                                </td>
                                <td class="pb-2"><?php echo htmlspecialchars($task['Deadline']); ?></td>
                                <td class="pb-2">
                                    <a href="/task/edit?id=<?php echo $task['TaskID']; ?>" class="rounded-md bg-blue-500 px-2 py-1 font-bold text-white hover:bg-blue-700">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once "../app/Views/Components/footer.php"; ?>
</body>
