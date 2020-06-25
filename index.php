<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>Example-jQuery-Ajax-load-Realtime-PHP-MySQL</title>
    <script>
        function GetDataRealtime() {
            $.ajax({
                    url: "getData.php",
                    type: "POST",
                    data: ''
                })
                .success(function(result) {
                    var obj = jQuery.parseJSON(result);
                    if (obj != '') {
                        $("#myBody").empty();
                        $.each(obj, function(key, val) {
                            var tr = "<tr>";
                            tr = tr + "<td>" + val["id"] + "</td>";
                            tr = tr + "<td>" + val["firstName"] + "</td>";
                            tr = tr + "<td>" + val["lastName"] + "</td>";
                            tr = tr + "<td>" + val["username"] + "</td>";
                            tr = tr + "<td>" + val["email"] + "</td>";
                            tr = tr + "<td>" + val["CountryCode"] + "</td>";
                            tr = tr + "</tr>";
                            $('#myTable > tbody:last').append(tr);
                        });
                    }

                });

        }
        GetDataRealtime();
        setInterval(GetDataRealtime, 10000); // 1000 = 1 second
    </script>
</head>

<body>
    <table width="600" border="1" id="myTable">
        <!-- head table -->
        <thead>
            <tr>
                <td width="91">
                    <div align="center">ID</div>
                </td>
                <td width="98">
                    <div align="center">FirstName</div>
                </td>
                <td width="198">
                    <div align="center">LastName</div>
                </td>
                <td width="97">
                    <div align="center">Username</div>
                </td>
                <td width="59">
                    <div align="center">Email</div>
                </td>
                <td width="71">
                    <div align="center">CountryCode</div>
                </td>
            </tr>
        </thead>
        <!-- body dynamic rows -->
        <tbody id="myBody"></tbody>
    </table>
</body>

</html>