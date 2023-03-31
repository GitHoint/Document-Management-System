<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Type</th>
      <th>Criticality</th>
      <th>Owner</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($obj = $result->fetch_object()) {
      echo "<tr class=\"tableRowReport\" onclick=\"window.location.href = '/document-management/document.php?documentId={$obj->id}';\" >";
      echo "<td class=\"docName\">{$obj->name}</td>";
      echo "<td class=\"docType\">{$obj->type}</td>";
      echo "<td class=\"docCriticality\">" . $obj->criticality . "</td>";
      echo "<td class=\"docOwner\">{$obj->owner}</td>";
      echo "<td class=\"uploadDate\">" . $obj->uploadDate . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>