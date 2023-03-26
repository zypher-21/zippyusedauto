<?php include('../controller_admin/header.php');
      include('../model/classes.php'); 
$classes = get_classes();
?>

<link rel="stylesheet" type="text/css" href="../view/css/style.css">

<section>
    <?php if($classes) { ?>
        <h1>Class List</h1>
        <section>
            <table>
            <?php foreach ($classes as $class) : ?>
                <tr>
                    <td>
                        <?= $class['class_name']; ?>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                            <button class="remove-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php } else { ?>
        <p>No Classes exist yet.</p>
        <?php } ?>
        </section>

        <h2>Add Class</h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="add_class">
            <div>
                <label>Name:</label>
                <input type="text" name="class_name" maxlength="50" placeholder="Name" autofocus required>
            </div>
            <br>
            <div>
                <button>Add</button>
            </div>
        </form>
        <section>
            <p><a href=".">View/Add Vehicles</a></p>
        </section>
</section>

<?php include('../controller_admin/footer.php') ?>

<style>
    /* Make the page responsive */
    section {
        max-width: 960px;
        margin: 0 auto;
        padding: 0 15px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 15px;
    }

    table {
        border-collapse: collapse;
        margin-bottom: 30px;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    form div {
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"], button {
        padding: 10px;
    }

    button {
        background-color: #4CAF50;
        border: none;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #3e8e41;
    }

    @media screen and (max-width: 768px) {
        h1 {
            font-size: 24px;
        }

        h2 {
            font-size: 20px;
        }

        table {
            font-size: 16px;
        }

        input[type="text"], button {
            padding: 8px;
            font-size: 16px;
        }
    }
</style>
