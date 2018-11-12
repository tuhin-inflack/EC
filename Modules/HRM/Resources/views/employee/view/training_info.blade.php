@foreach($employee->employeeTrainingInfo as $training)
    <table class="table">
        <tbody>
        <tr>
            <th scope="col">Course Name</th>
            <td>{{$training->course_name}}</td>
        </tr>

        <tr>
            <th scope="col">Organization Name</th>
            <td>{{$training->organization_name}}</td>
        </tr>
        <tr>
            <th scope="col">Course Duration</th>
            <td>{{$training->course_duration}}</td>
        </tr>
        <tr>
            <th scope="col">Training Duration</th>
            <td>{{$training->course_duration}}</td>
        </tr>
        <tr>
            <th scope="col">Training completion year</th>
            <td>{{$training->training_year}}</td>
        </tr>


        <tr>
            <th scope="col">Organization country</th>
            <td>{{$training->organization_country}}</td>
        </tr>
        <tr>
            <th scope="col">Result</th>
            <td>{{$training->Result}}</td>
        </tr>
        <tr>
            <th scope="col">Achievement</th>
            <td>{{$training->achievement}}</td>
        </tr>


        </tbody>
    </table>
@endforeach