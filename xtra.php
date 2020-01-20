 
1: <?php
2:  include 'ch19_include.php';
3:  //determine if they need to see the form or not
4:  if (!$_POST) {
5:      //they need to see the form, so create form block
6:     $display_block = <<<END_OF_BLOCK
     <form method="POST" action="$_SERVER[PHP_SELF]">
8:
9:     <p><label for="email">Your E-Mail Address:</label><br/>
10:    <input type="email" id="email" name="email"
11:           size="40" maxlength="150" /></p>
12:
13:    <fieldset>
14:    <legend>Action:</legend><br/>
15:    <input type="radio" id="action_sub" name="action"
16:           value="sub" checked />
17:    <label for="action_sub">subscribe</label><br/>
18:    <input type="radio" id="action_unsub" name="action"
19:           value="unsub" />
20:    <label for="action_unsub">unsubscribe</label>
21:    </fieldset>
22:
23:    <button type="submit" name="submit" value="submit">Submit</button>
24:    </form>
25:  END_OF_BLOCK;
26:  } else if (($_POST) && ($_POST['action'] == "sub")) {
27:      //trying to subscribe; validate email address
28:      if ($_POST['email'] == "") {
29:          header("Location: manage.php");
30:          exit;
31:      } else {
32:          //connect to database
33:          doDB();
34:
35:          //check that email is in list
36:          emailChecker($_POST['email']);
37:
38:          //get number of results and do action
39:          if (mysqli_num_rows($check_res) < 1) {
40:              //free result
41:              mysqli_free_result($check_res);
42:
43:              //add record
44:              $add_sql = "INSERT INTO subscribers (email)
45:                         VALUES('".$safe_email."')";
46:              $add_res = mysqli_query($mysqli, $add_sql)
47:                         or die(mysqli_error($mysqli));
48:              $display_block = "<p>Thanks for signing up!</p>";
49:
50:              //close connection to MySQL
51:              mysqli_close($mysqli);
52:          } else {
53:              //print failure message
54:              $display_block = "<p>You're already subscribed!</p>";
55:          }
56:      }
57:  } else if (($_POST) && ($_POST['action'] == "unsub")) {
58:      //trying to unsubscribe; validate email address
59:      if ($_POST['email'] == "") {
60:          header("Location: manage.php");
61:          exit;
62:      } else {
63:          //connect to database
64:          doDB();
65:
66:          //check that email is in list
67:          emailChecker($_POST['email']);
68:
69:          //get number of results and do action
70:          if (mysqli_num_rows($check_res) < 1) {
71:              //free result
72:              mysqli_free_result($check_res);
73:
74:              //print failure message
75:              $display_block = "<p>Couldn't find your address!</p>
76:              <p>No action was taken.</p>";
77:          } else {
78:              //get value of ID from result
79:              while ($row = mysqli_fetch_array($check_res)) {
80:                  $id = $row['id'];
81:              }
82:
83:              //unsubscribe the address
84:              $del_sql = "DELETE FROM subscribers
85:                          WHERE id = ".$id;
86:              $del_res = mysqli_query($mysqli, $del_sql)
87:                         or die(mysqli_error($mysqli));
88:              $display_block = "<p>You're unsubscribed!</p>";
89:          }
90:          mysqli_close($mysqli);
91:      }
92:  }
93:  ?>
94:  <!DOCTYPE html>
95:  <html>
96:  <head>
97:  <title>Subscribe/Unsubscribe to a Mailing List</title>
98:  </head>
99:  <body>
100: <h1>Subscribe/Unsubscribe to a Mailing List</h1>
101: <?php echo "$display_block"; ?>
102: </body>
103: </html>