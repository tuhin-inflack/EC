<table class="table ">
    <tbody>

    <tr>
        <th scope="col">First Name</th>
        <td>{{$employee->first_name}}</td>
    </tr>
    <tr>

        <th scope="col">Last Name</th>
        <td>{{$employee->last_name}}</td>
    </tr>
    <tr>
        <th scope="col">Email</th>
        <td>{{$employee->email}}</td>
    </tr>
    <tr>
        <th scope="col">Gender</th>
        <td>{{$employee->gender}}</td>
    </tr>
    <tr>
        <th scope="col">Department</th>
        <td>{{$employee->employeeDepartment->name}}</td>
    </tr>
    <tr>
        <th scope="col">Status</th>
        <td>{{$employee->status}}</td>
    </tr>
    <tr>
        <th scope="col">Tel (office)</th>
        <td>{{$employee->tel_office}}</td>
    </tr>
    <tr>
        <th scope="col">Tel (home)</th>
        <td>{{$employee->tel_home}}</td>
    </tr>
    <tr>
        <th scope="col">Mobile(one)</th>
        <td>{{$employee->mobile_one}}</td>
    </tr>
    <tr>
        <th scope="col">Mobile(two)</th>
        <td>{{$employee->mobile_two}}</td>
    </tr>
    </tbody>
</table>
{{--<a href="{{url('/hrm/employee/')}}"--}}
<a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit') }}">Edit </a>
