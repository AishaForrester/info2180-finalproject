<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New Contact</title>
    <link rel="stylesheet" href="newContact.css" media="screen">
    <script src="script.js"></script>
  </head>
  <body>
    <div class="box">
      <h1>New Contact</h1>
      <form id="myform" action="process.php"  method="post">

      <div id="group1">
        <label for="title">Title</label>
        <select name="title" id="title">
          <option value="mr">Mr.</option>
          <option value="ms">Ms.</option>
          <option value="mrs">Mrs.</option>
        </select>
      </div>

        <div class="group2">
          <label for="firstname">First Name </label>
          <input type="text" id="firstname" name="firstname" placeholder="Jane" required>
        
          <label for="lastname">Last Name </label>
          <input type="text" id="lastname" name="lastname" placeholder="Doe"  required>
        </div>

        <div class="group3">
          <label for="telephone">Telephone</label>
          <input type="tel" id="telephone" name="telephone" placeholder="e.g. 876-999-9999" required pattern="^\d{3}-\d{3}-\d{4}$" title="876-999-1234">
      
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="e.g. name@mymona.uwi.edu" required>

        </div>

        <div class="group4">
          <label for="company">Company</label>
          <input type="text" name="company" id="company" placeholder="Enter company" required>
            
          <label for="type">Type</label>
          <select name="type" id="type" required>
            <option value="salesLead">Sales Lead</option>
            <option value="other">Support</option>
          </select>
        </div>

           
        <div class="group5">
          <label for="assignedTo">Assigned To</label>
              <select name="assignedTo" id="assignedTo">
                <option value="andyBernard">Andy Bernard</option>
                <option value="other">Other</option>
              </select>
        </div>

        <button type="submit" name="submitBtn" class="btn">Save</button>
      </form>
    </div>
  </body>
</html>
