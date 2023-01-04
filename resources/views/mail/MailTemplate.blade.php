<center><h3>Please Verify your email address</h3></center>

<p>Hello <b>{{$details['name']}}</b>!</p>
<p>Below is your data:</p>
<table>
  <tr>
    <td>Role</td>
    <td>:</td>
    <td>{{$details['role']}}</td>
  </tr>
  <tr>
    <td>Register Date</td>
    <td>:</td>
    <td>{{$details['datetime']}}</td>
  </tr>
</table>

<center>
  <h4>Copy link below to your browser for account verification:</h4>
  <b style="color:blue">{{$details['url']}}</b>
</center>

<p>Thank You for Signing Up.</p>