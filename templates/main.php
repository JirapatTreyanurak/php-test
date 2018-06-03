    <main>
        <p>Welcome to Stupid website!<p>
        <p>Already a Stupid member? Log in!</p>
        <form action="#" method="post">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username">
            <button type="submit">Log in</button>
        </form>
        <p>New to Stupid? Don't worry! Just log in with your desired username!</p>
        <?php

        $members = $db->getMembers();
        if (count($members) == 0) {
            echo "<p>Become our very first Stupid member today!</p>\n";
        } else {
            echo "<p>Here's a list of our Stupid members!</p>\n";
            echo "\t\t<p>";
            for ($i = 0; $i < count($members); $i++) {
                echo $members[$i]["username"];
                if ($i < count($members)-1) {
                    echo ", ";
                }
            }
            echo "</p>\n";
        }

        ?>
    </main>
