<?php include('../controller_admin/header.php');
    include('../model/types.php');

    $types = get_types();
?>

<link rel="stylesheet" type="text/css" href="../view/css/style.css"> 

<section>
    <?php if($types) { ?>
        <h1>Type List</h1>
        <table>
            <?php foreach ($types as $type) : ?>
                <tr>
                    <td><?= $type['type_name']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                            <button class="remove-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <p>No Types exist yet.</p>
    <?php } ?>

    <h2>Add Type</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_type">
        <div>
            <label for="type_name">Name:</label>
            <input type="text" name="type_name" id="type_name" maxlength="50" placeholder="Name" autofocus required>
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>

    <p><a href=".">View/Add Vehicles</a></p>
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
