<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</head>

<style>
    ul {
        list-style-type: none;
    }

    .test {
        max-width: 30%;

    }

    .test2 {
        align: center;
    }




    .ulProject {}

    .ulTask {}

    .ulReport {}
</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Column: AdminLTE Dashboard -->
            <div class="col-md-2">
                @include('adminlte_dashboard') <!-- Include the AdminLTE Dashboard template -->
            </div>

            <!-- Center Column: Display Projects -->
            <div class="col-md-8" style="padding-top: 10%">
                <div id="job-list">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('Progress bar') }} </h3>
                        </div>

                        <div id="progressBar" class="card-body">

                        </div>



                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div>Jan Erjavec</div>
                <div>jancek.erjavec@gmail.com</div>
                <div>041-947-895</div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getProjects',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var projects = data.projects
                    console.log(projects);
                    displayProjects(projects);


                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        // Function to display the job list
        // Progress bar -> http://getbootstrap.com/components/#progress
        function displayProjects(projects) {
            var progressDiv = $('#progressBar');
            progressDiv.empty();



            projects.forEach(function(project) {
                var ulProject = $('<ul id="projectUl">');
                var ulTask = $('<ul id = "taskUl">');


                var tasks = project.tasks;
                var RPP = 0; //Reports Per Project
                var AVP = 0; //Average completion Per Project


                tasks.forEach(function(task) {
                    var reports = task.reports;
                    var RPT = 0; //Reports Per Task
                    var AVT = 0; //Average completion Per Task
                    var ulReport = $('<ul id = "reportUl">');

                    reports.forEach(function(report) {

                        if (report.percent_done > 0) {
                            AVT += report.percent_done;
                        } else {
                            AVT += 0;
                        }

                        ulReport.append(getProgressBar(report.name, report.percent_done));

                    }); //Reports

                    RPP += reports.length;
                    RPT = reports.length;

                    AVT = AVT / RPT; //Calculates the average completion of tasks
                    if (AVT > 0) {
                        AVP +=
                            AVT; //Adds the average completion of tasks to average completion of projects this used used later to calculate the average completion of projects
                    }

                    ulTask.append(getProgressBar(task.name, AVT));

                    ulTask.append(ulReport);
                }); //Tasks
                AVP = AVP / RPP; //Calculates the average completion of the project

                ulProject.append(getProgressBar(project.name, AVP));


                ulProject.append(ulTask);

                progressDiv.append(ulProject);

            }); //Projects
        }


        function getProgressBar(name, percentage) {
            percentage = percentage.toFixed(2);

            var displayProgressBar = '';
            //console.log(percentage);

            var progressBarColor;

            if (percentage < 30) {
                progressBarColor = 'bg-danger';
            } else if (percentage >= 30 && percentage < 60) {
                progressBarColor = 'bg-orange';
            } else if (percentage >= 60 && percentage < 100) {
                progressBarColor = 'bg-warning';
            } else if (percentage == 100) {
                progressBarColor = 'bg-success';
            } else if (percentage == null) {
                progressBarColor = 'bg-danger';
            } else {
                var displayProgressBar = '<li class="ulProject d-flex align-items-center">' +
                '<span class="mr-3">' + name + '</span>' +
                '</li>';
                
                return displayProgressBar;
            }


            var displayProgressBar = '<li class="ulProject d-flex align-items-center">' +
                '<span class="mr-3">' + name + '</span>' +
                '<div class="progress" style="width:150px; height:20px;">' +
                '<div class="progress-bar ' + progressBarColor + '" role="progressbar" aria-valuenow="' + percentage +
                '" aria-valuemin="0" aria-valuemax="100" style="width: ' + percentage + '%">' +
                percentage + '%' + // Display the percentage inside the progress bar
                '</div>' +
                '</div>' +
                '</li>';

            return displayProgressBar;
        }

        
    </script>


</body>

</html>
