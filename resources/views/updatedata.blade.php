n<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Update User Detail</title>
  </head>
  <body>

    <div class="container">

        <section class="mt-5">
            <form action="{{ route('updateData') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @foreach($data as $userData)
                    <div class="form-group">
                        <label for="labelName">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $userData->name }}">
                        <input type="hidden" class="form-control" name="id" value="{{ $userData->id }}">
                    </div>
                    

                    <div class="form-group">
                        <label for="dateOfBirthday">Date of Birhtday</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" 
                        value="{{ old('tanggal_lahir', optional($userData)->tanggal_lahir
                                        ? date('d-m-Y', strtotime(optional($userData)->tanggal_lahir)) : '') }}" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ $userData->gaji }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="1" @if(old('status_karyawan', optional($userData)->status_karyawan) == '1')selected @endif>
                                Active
                            </option>
                            <option value="0" @if(old('status_karyawan', optional($userData)->status_karyawan) == '0')selected @endif>
                                Not Active
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                @endforeach
            </form>
            
        </section>
        

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>