/* Gantt chart
---------------------------
    - Following Src : https://docs.dhtmlx.com/gantt/samples/04_customization/15_baselines.html

    - Variables
        - let nodeName
        - let chardData

*/
$(window).on("load", function () {

    gantt.config.readonly = true;

    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.task_height = 12;
    gantt.config.row_height = 35;
    gantt.locale.labels.baseline_enable_button = 'Set';
    gantt.locale.labels.baseline_disable_button = 'Remove';

    gantt.config.lightbox.sections = [
        {
            name: "description",
            height: 50,
            map_to: "text",
            type: "textarea",
            focus: true
        },
        {
            name: "time",
            map_to: "auto",
            type: "duration"
        },
        {
            name: "baseline",
            map_to: {start_date: "planned_start", end_date: "planned_end"},
            button: true,
            type: "duration_optional"
        }
    ];
    gantt.locale.labels.section_baseline = "Planned";


    // adding baseline display
    gantt.addTaskLayer(function draw_planned(task) {
        if (task.planned_start && task.planned_end) {
            var sizes = gantt.getTaskPosition(task, task.planned_start, task.planned_end);
            var el = document.createElement('div');
            el.className = 'baseline';
            el.style.left = sizes.left + 'px';
            el.style.width = sizes.width + 'px';
            el.style.top = sizes.top + gantt.config.task_height + 13 + 'px';
            return el;
        }
        return false;
    });

    gantt.templates.task_class = function (start, end, task) {
        if (task.planned_end) {
            var classes = ['has-baseline'];
            if (end.getTime() > task.planned_end.getTime()) {
                classes.push('overdue');
            }
            return classes.join(' ');
        }
    };

    gantt.templates.rightside_text = function (start, end, task) {
        if (task.planned_end) {
            if (end.getTime() > task.planned_end.getTime()) {
                var overdue = Math.ceil(Math.abs((end.getTime() - task.planned_end.getTime()) / (24 * 60 * 60 * 1000)));
                var text = "<b>Overdue: " + overdue + " days</b>";
                return text;
            }
        }
    };

    gantt.config.columns = [
        {
            name: "text",
            label: "Task name",
            width: "*"
        },
        {
            name: "start_date",
            label: "Start time",
            align: "center"
        },
        {
            name: "duration",
            label: "Duration",
            align: "center"
        },
    ];


    gantt.attachEvent("onTaskLoading", function (task) {
        task.planned_start = gantt.date.parseDate(task.planned_start, "xml_date");
        task.planned_end = gantt.date.parseDate(task.planned_end, "xml_date");
        return true;
    });

    gantt.init(nodeName);
    gantt.parse(chartData);


});

function exportGantt(mode) {
    if (mode == "png")
        gantt.exportToPNG({
            header: '<link rel="stylesheet" href="//dhtmlx.com/docs/products/dhtmlxGantt/common/customstyles.css" type="text/css">'
        });
    else if (mode == "pdf")
        gantt.exportToPDF({
            header: '<link rel="stylesheet" href="//dhtmlx.com/docs/products/dhtmlxGantt/common/customstyles.css" type="text/css">'
        });
}
