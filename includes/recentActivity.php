<table>
  <thead>
    <tr>
      <th>Username</th>
      <th>Action</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($obj = $ral_list->fetch_object()) {
      echo "<tr class=\"tableRow\" >";
      echo "<td class=\"usernameColumn\">{$obj->username}</td>";
      echo "<td class=\"actionColumn\">{$obj->action}</td>";
      echo "<td class=\"dateColumn\">" . $obj->accessDate . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>