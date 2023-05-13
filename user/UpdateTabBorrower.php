<html>

<head>
    <title>Update Tab Borrower</title>
    <link rel="stylesheet" href="../css/UpdateTabBorrower.css">
</head>

<body>
    <form>
        <table bgcolor=#b19cd9 align=right width=2 5% height=1 00% cellpadding=2>
            <tr>
                <td>School ID NUMBER
            </tr>
            <tr>
                <td colspan=2><input type="number" class="input-field" style="width:100%;"></td>
            </tr>
            <tr>
                <td>First Name</td>
            </tr>
            <tr>
                <td colspan=2><input type="text" class="input-field" style="width:100%;"></td>
            </tr>
            <tr>
                <td>Last Name</td>
            </tr>
            <tr>
                <td colspan=2><input type="text" class="input-field" style="width:100%;"></td>
            </tr>
            <tr>
                <td>Gender</td>
            </tr>
            <tr>
                <td colspan=2>
                    <select style="width:100%;">
					<option>Select</option>
					<option>Male</option>
					<option>Female</option>
					<option>Other</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Contact Number</td>
            </tr>
            <tr>
                <td colspan=2><input type="number" class="input-field"></td>
            </tr>
            <tr>
                <td>Department</td>
            </tr>
            <tr>
                <td>
                    <colspan colspan=2><select style="width:100%;"></colspan>
					<option>Select</option>
					<option>BSIS</option>
					<option>BSCS</option>
					<option>BSCE</option>
					<option>BSED</option>
					<option>COED</option>
					<option>COED</option>
				</select>
                </td>
            </tr>

            <td>Section</td>
            </tr>
            <tr>
                <td><input type="number" class="input-field" style="width:100%;"></td>
            </tr>
            <tr>
                <td>Year</td>
            </tr>
            <tr>
                <td><input type="Text" class="input-field" style="width:100%;"></td>
            </tr>
            <tr>
                <td>Type</td>
                <tr>
                    <td colspan=2><select style="width:100%;">
					<option>Select</option>
					<option>Student</option>
					<option>Faculty</option>
					<option>Teacher</option>
				</select></td>
                </tr>
                <tr>
                    <td><button type="submit" class="button" style="background-color: #4CAF50;" value="Update" onclick=Update()>Update</button>
                        <button type="submit" class="button" style="background-color: #f44336;" value="Cancel" onclick=Cancel()>Cancel</button>
                    </td>
                </tr>
        </table>
    </form>