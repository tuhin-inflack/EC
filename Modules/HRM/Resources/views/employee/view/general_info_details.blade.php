<table class="table ">
    <tbody>
<tr>
    <th>Image</th>
    <td><img src="{{ asset('images/'.$employee->photo) }}" width="200px" height="200px"></td>
</tr>
    <tr>
        <th class="">First Name</th>
        <td>{{$employee->first_name}}</td>
    </tr>
    <tr>

        <th class="">Last Name</th>
        <td>{{$employee->last_name}}</td>
    </tr>
    <tr>
        <th class="">Email</th>
        <td>{{$employee->email}}</td>
    </tr>
    <tr>
        <th class="">Gender</th>
        <td>{{$employee->gender}}</td>
    </tr>
    <tr>
        <th class="">Department</th>
        <td>{{$employee->employeeDepartment->name}}</td>
    </tr>
    <tr>
        <th class="">Status</th>
        <td>{{$employee->status}}</td>
    </tr>
    <tr>
        <th class="">Tel (office)</th>
        <td>{{$employee->tel_office}}</td>
    </tr>
    <tr>
        <th class="">Tel (home)</th>
        <td>{{$employee->tel_home}}</td>
    </tr>
    <tr>
        <th class="">Mobile(one)</th>
        <td>{{$employee->mobile_one}}</td>
    </tr>
    <tr>
        <th class="">Mobile(two)</th>
        <td>{{$employee->mobile_two}}</td>
    </tr>
    </tbody>
</table>
{{--<a href="{{url('/hrm/employee/')}}"--}}
<a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit') }}">Edit </a>
