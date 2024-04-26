<?php
require 'config.php';

?>
<html>

<head></head>

<body>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
        </tr>

        <?php
        $i = 1;

        $result = mysqli_query($conn, "SELECT * FROM tb_images");


        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <?php

                    ?>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <?php
                        $filesArray = json_decode($row["image"], true);
                        if (is_array($filesArray)) {
                            foreach ($filesArray as $image) {
                        ?>
                                <?php echo $image; ?>
                                <img src="uploads/<?php echo $image; ?>" width="200">
                        <?php
                            }
                        } else {
                            echo "No images";
                        }
                        ?>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="upload.php">Upload Image</a>
</body>

</html>