<?php include('../controller_admin/header.php'); ?>

<link rel="stylesheet" type="text/css" href="../view/css/style.css"> 
<section>
    <section>
        <form action="." method="get">
            <input type="hidden" name="action" value="list_vehicles">
            <table>
                <tr>
                    <td>
                        <h3>Order By:</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="." method="get">
                            <input type="hidden" name="action" value="list_vehicles">
                            <select name="order" required>
                                <option value="0">price</option>
                                <option value="1">year</option>
                            </select>
                            <button>Go</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Filter By:</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Make:</p>
                    </td>
                    <td>
                        <select name="make_id" required>
                            <option value="0">View All</option>
                            <?php foreach ($makes as $make) : ?>
                            <?php if($make_id == $make['make_id']){ ?>
                                <option value="<?= $make['make_id'] ?>" selected>
                            <?php } else { ?>
                                <option value="<?= $make['make_id'] ?>">
                            <?php } ?>
                                    <?= $make['make_name'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <p>Class:</p>
                    </td>
                    <td>
                        <select name="class_id" required>
                            <option value="0">View All</option>
                            <?php foreach ($classes as $class) : ?>
                            <?php if($class_id == $class['class_id']){ ?>
                                <option value="<?= $class['class_id'] ?>" selected>
                            <?php } else { ?>
                                <option value="<?= $class['class_id'] ?>">
                            <?php } ?>
                                    <?= $class['class_name'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <p>Type:</p>
                    </td>
                    <td>
                        <select name="type_id" required>
                            <option value="0">View All</option>
                            <?php foreach ($types as $type) : ?>
                            <?php if($type_id == $type['type_id']){ ?>
                                <option value="<?= $type['type_id'] ?>" selected>
                            <?php } else { ?>
                                <option value="<?= $type['type_id'] ?>">
                            <?php } ?>
                                    <?= $type['type_name'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <button>Go</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <section >
        <?php if($vehicles){ ?>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Model</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td>
                        <?= $vehicle['year'] ?>
                    </td>
                    <td>
                        <?= $vehicle['price'] ?>
                    </td>
                    <td>
                        <?= $vehicle['model'] ?>
                    </td>
                    <td>
                        <?= get_make_name($vehicle['make_id']) ?>
                    </td>
                    <td>
                        <?= get_type_name($vehicle['type_id']) ?>
                    </td>
                    <td>
                        <?= get_class_name($vehicle['class_id']) ?>
                    </td>
                    <td><form action="." method="post">
                                <input type="hidden" name="action" value="delete_vehicle">
                                <input type="hidden" name="vehicle_id" value="<?=$vehicle['vehicle_id']?>">
                                <button class="remove-button">Remove</button>
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <p>No vehicles exist in list</p>
        <?php } ?>
    </section>

    <section>
    <p><a href="addVehicleForm.php?action=addVehicleForm">Add Vehicle</a></p>
    <p><a href="makeList.php?action=makeList">View/Edit Makes</a></p>
    <p><a href="typeList.php?action=typeList">View/Edit Types</a></p>
    <p><a href="classList.php?action=classList">View/Edit Classes</a></p>
</section>

</section>
<?php include('../controller_admin/footer.php'); ?>