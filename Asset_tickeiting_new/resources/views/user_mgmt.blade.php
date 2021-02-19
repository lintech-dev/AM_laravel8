@include('layouts.app')
<?php include ('conn.php') ?>

     <section id="main-content">
      <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
         @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">�</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif

<div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Register</h4>

                    <form method="POST" action="insert_user">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                        </div>

                        <!-- New Row --------- -->
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department/Role') }}</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contactno" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="contactno" type="text" class="form-control" name="contactno" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="segment" class="col-md-4 col-form-label text-md-right">{{ __('Segment') }}</label>

                            <div class="col-md-6">
                              <!--  <input id="segment" type="text" class="form-control" name="segment" autofocus> -->
                                <select name="segment" class='form-control' >
                                <option value="">--Select--</option>
                                <?php
                                $query1="select seg_id,seg_name from segment_info";
                                $stmt1 = $conn->query($query1);
                                while($row1 = $stmt1->fetch())
                                {
                                    $empid = $row1['seg_id'];
                                    $segname = $row1['seg_name'];
                                    echo"<option value='$segname'>$segname</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-theme">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div></div></div>



                 <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Registred User Management</h4>

              <table class="table">
<tr style="background-color:#4ECDC4; color: #ffffff;">
<th style="text-align:left;"> Sl No </th>
<th style="text-align:left;"> Name </th>
<th style="text-align:left;"> Email </th>
<th style="text-align:left;"> Department </th>
<th style="text-align:left;"> Location </th>
<th style="text-align:left;"> Delete </th>

</tr>
<tr>{{ csrf_field() }}</tr>

<?php
include('conn.php');
$query = "select * from users";
$stmt = $conn->query($query);
while($row = $stmt->fetch())
{
$id = $row['id'];
$compname = $row['name'];
$email = $row['email'];
$dept = $row['department'];
$location = $row['location'];
?>
<tr>
<input type="hidden" name="id" value="{{ $value->id }}">

<td style="text-align: left;"> <?php echo"$id";?>  </td>
<td style="text-align: left;"> <?php echo"$compname";?>  </td>
<td style="text-align: left;"> <?php echo"$email";?>  </td>
<td style="text-align: left;"> <?php echo"$dept";?>  </td>
<td style="text-align: left;"> <?php echo"$location";?>  </td>
<td style="text-align: left;" ><a href="user_del/<?php echo"$id"; ?>" onClick="return confirm('Are you sure do you want to Delete this User?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<!--  -->
</tr>
<?php
}
?>
</table>

              </div></div></div>

</section></section>

@include('footer');
