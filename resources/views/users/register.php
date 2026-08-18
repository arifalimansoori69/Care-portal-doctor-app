<?php include('db.php'); if(session_status()===PHP_SESSION_NONE){session_start();} ?>
<?php
$errors=[]; $success=false;
if($_SERVER['REQUEST_METHOD']==='POST'){
  $role=$_POST['role']??'patient';
  $name=trim($_POST['name']??'');
  $email=trim($_POST['email']??'');
  $phone=trim($_POST['phone']??'');
  $address=trim($_POST['address']??'');
  $password=trim($_POST['password']??'');
  $city_id=(int)($_POST['city_id']??0);
  $specialization=trim($_POST['specialization']??'');
  if(!in_array($role,['doctor','patient'])) $role='patient';
  if($name==='') $errors[]='Name required';
  if($email===''||!filter_var($email,FILTER_VALIDATE_EMAIL)) $errors[]='Valid email required';
  if($phone==='') $errors[]='Phone required';
  if($address==='') $errors[]='Address required';
  if($password==='') $errors[]='Password required';
  if(!$errors){
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $stmt=$conn->prepare("INSERT INTO users (name,email,phone,address,password_hash,role) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss',$name,$email,$phone,$address,$hash,$role);
    if($stmt->execute()){
      $user_id=$stmt->insert_id; $stmt->close();
      if($role==='doctor'){
        $stmt=$conn->prepare("INSERT INTO doctors (user_id, city_id, specialization) VALUES (?,?,?)");
        $stmt->bind_param('iis',$user_id,$city_id,$specialization); $stmt->execute(); $stmt->close();
      } else {
        $stmt=$conn->prepare("INSERT INTO patients (user_id, city_id) VALUES (?,?)");
        $stmt->bind_param('ii',$user_id,$city_id); $stmt->execute(); $stmt->close();
      }
      $success=true;
    } else { $errors[]='Email already exists or invalid data.'; }
  }
}
$cities=[]; $res=$conn->query("SELECT id,name FROM cities ORDER BY name"); if($res){while($r=$res->fetch_assoc()){$cities[]=$r;}}
require_once __DIR__.'/includes/header.php';
?>
<section class="hero"><h1>Register</h1><p class="muted">Create a Doctor or Patient account</p></section>
<div class="card">
  <?php if($success): ?><div>Registration successful. <a class="nav-link" href="/care_portal/login.php">Login</a></div><?php endif; ?>
  <?php if($errors): ?><div style="color:#fca5a5;margin-bottom:10px"><?php foreach($errors as $e): ?><div>• <?php echo htmlspecialchars($e); ?></div><?php endforeach; ?></div><?php endif; ?>
  <form method="post" action="">
    <div style="display:grid;gap:10px;max-width:640px;grid-template-columns:1fr 1fr">
      <select class="select" name="role">
        <option value="patient">Patient</option>
        <option value="doctor">Doctor</option>
      </select>
      <select class="select" name="city_id" required>
        <option value="">Select City</option>
        <?php foreach($cities as $c): ?><option value="<?php echo (int)$c['id']; ?>"><?php echo htmlspecialchars($c['name']); ?></option><?php endforeach; ?>
      </select>
      <input class="input" type="text" name="name" placeholder="Full Name" />
      <input class="input" type="email" name="email" placeholder="Email" />
      <input class="input" type="text" name="phone" placeholder="Phone" />
      <input class="input" type="text" name="address" placeholder="Address" />
      <input class="input" type="password" name="password" placeholder="Password" />
      <input class="input" type="text" name="specialization" placeholder="Specialization (Doctor only)" />
    </div>
    <div style="margin-top:10px"><button class="button" type="submit">Register</button></div>
  </form>
</div>
<?php require_once __DIR__.'/includes/footer.php'; ?>
