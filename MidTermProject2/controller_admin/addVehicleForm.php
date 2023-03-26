<?php include('../controller_admin/header.php'); ?>

<link rel="stylesheet" type="text/css" href="../view/css/style.css"> 
<section>
    <h1>Add Vehicle</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_vehicle">
        <table>
  <tr>
    <td>
      <label for="year">Year:</label>
    </td>
    <td>
      <input type="number" id="year" name="year" required>
    </td>
  </tr>
  <tr>
    <td>
      <label for="price">Price:</label>
    </td>
    <td>
      <input type="number" id="price" name="price" required>
    </td>
  </tr>
  <tr>
    <td>
      <label for="model">Model:</label>
    </td>
    <td>
      <input type="text" id="model" name="model" required>
    </td>
  </tr>
  <tr>
    <td>
      <label for="make_id">Make:</label>
    </td>
    <td>
      <select id="make_id" name="make_id" required>
        <option value="">Select a make</option>
        <?php foreach ($makes as $make) : ?>
          <option value="<?= $make['make_id'] ?>"><?= $make['make_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      <label for="type_id">Type:</label>
    </td>
    <td>
      <select  name="type_id" required>
        <option value="">Select a type</option>
        <?php foreach ($types as $type) : ?>
          <option value="<?= $type['type_id'] ?>"><?= $type['type_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      <label for="class_id">Class:</label>
    </td>
    <td>
      <select id="class_id" name="class_id" required>
        <option value="">Select a class</option>
        <?php foreach ($classes as $class) : ?>
          <option value="<?= $class['class_id'] ?>"><?= $class['class_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </td>
  </tr>
  
</table>
        <br>
        <div>
            <button>Add</button>
        </div>
    </form>
    <section >
        <p><a href=".">View Vehicles</a></p>
    </section>
</section>

<?php include('../controller_admin/footer.php'); ?>
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
