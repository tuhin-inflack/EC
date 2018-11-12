@foreach($employee->employeeEducationInfo as  $education)
    <table class="table">
        <tbody>

        <tr>
            <th scope="col">Institute name</th>
            <td>{{ $education->institute_name}}</td>
        </tr>
        <tr>
            <th scope="col">Degree name</th>
            <td>{{ $education->degree_name}}</td>
        </tr>

        <tr>
            <th scope="col">Department/Section/Group</th>
            <td>{{ $education->department}}</td>
        </tr>
        <tr>
            <th scope="col">Passing year</th>
            <td>{{ $education->passing_year}}</td>
        </tr>
        <tr>
            <th scope="col">Medium</th>
            <td>{{ $education->medium}}</td>
        </tr>
        <tr>
            <th scope="col">Result</th>
            <td>{{ $education->result}}</td>
        </tr>
        <tr>
            <th scope="col">Achievement</th>
            <td>{{ $education->achievement}}</td>
        </tr>


        </tbody>
    </table>
@endforeach