<table class="table">
    <tbody>

    <tr>
        <th >Father's Name</th>
        <td>{{ $employee->employeePersonalInfo->father_name }}</td>
    </tr>
    <tr>

        <th >Mother's Name</th>
        <td>{{$employee->employeePersonalInfo->mother_name}}</td>
    </tr>
    <tr>
        <th >Title Name</th>
        <td>{{$employee->employeePersonalInfo->title}}</td>
    </tr>
    <tr>
        <th >Date of Birth</th>
        <td>{{$employee->employeePersonalInfo->date_of_birth}}</td>
    </tr>
    <tr>
        <th >Job joining date</th>
        <td>{{$employee->employeePersonalInfo->job_joining_date}}</td>
    </tr>
    <tr>
        <th >Current position joining date</th>
        <td>{{$employee->employeePersonalInfo->current_position_joining_date }}</td>
    </tr>
    <tr>
        <th >Current position expire date</th>
        <td>{{$employee->employeePersonalInfo->current_position_expire_date}}</td>
    </tr>
    <tr>
        <th >Salary scale</th>
        <td>{{$employee->employeePersonalInfo->salary_scale}}</td>
    </tr>
    <tr>
        <th >Total salary</th>
        <td>{{$employee->employeePersonalInfo->total_salary}}</td>
    </tr>
    <tr>
        <th >Marital status</th>
        <td>{{$employee->employeePersonalInfo->marital_status}}</td>
    </tr>
    <tr>
        <th >Number of children</th>
        <td>{{$employee->employeePersonalInfo->number_of_children}}</td>
    </tr>

    </tbody>
</table>

<a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#personal') }}">Edit </a>
