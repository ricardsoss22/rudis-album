<?php
$title = "Show";


if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        // echo "Logged in as: " . htmlspecialchars($username);
        require_once "../app/Models/project.php";

        // Pārbaudam vai ir norādīts projekta ID GET parametrā
        if (isset($_GET['id'])) {
            $projectID = $_GET['id'];
            $projectModel = new projectModel();
            $projectData = $projectModel->getProjectByID($projectID); // Jāpielāgo atbilstoši jūsu modeļiem

            if ($projectData) {
                // Pārsūtam projektu datus uz attiecīgo skatu
                $title = "Project Name: " . ($projectData['Title'] ?? '');
                
                // Iegūstam visus uzdevumus attiecīgajam projektam (pielāgojiet šo kodu savam datu avotam)
                require_once "../app/Models/task.php";
                $taskModel = new taskModel();
                $tasks = $taskModel->getAllTasksByProject($projectID);
                 // Pielāgojiet šo metodi savām vajadzībām

                // Pārsūtam uzdevumu sarakstu uz attiecīgo skatu
                require_once "../app/Views/project/show.view.php";
            } else {
                echo "Project not found";
            }
        } else {
            echo "Project ID not specified";
        }
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}

?>
