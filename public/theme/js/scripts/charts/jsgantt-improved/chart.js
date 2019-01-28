/*=========================================================================================
    File Name: gantt-chart.js
    Description: D3 gantt chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Gantt chart
// ------------------------------
$(window).on("load", function(){

    var g = new JSGantt.GanttChart(document.getElementById('GanttChartDIV'), 'day');

    g.setOptions({
        vCaptionType: 'Complete',  // Set to Show Caption : None,Caption,Resource,Duration,Complete,
        vQuarterColWidth: 36,
        vDateTaskDisplayFormat: 'day dd month yyyy', // Shown in tool tip box
        vDayMajorDateDisplayFormat: 'mon yyyy - Week ww',// Set format to dates in the "Major" header of the "Day" view
        vWeekMinorDateDisplayFormat: 'dd mon', // Set format to display dates in the "Minor" header of the "Week" view
        vLang: 'en',
        vShowTaskInfoLink: 1, // Show link in tool tip (0/1)
        vShowEndWeekDate: 0,  // Show/Hide the date for the last day of the week in header for daily
        vAdditionalHeaders: { // Add data columns to your table
            category: {
                title: 'Category'
            },
            sector: {
                title: 'Sector'
            }
        },
        vUseSingleCell: 10000, // Set the threshold cell per table row (Helps performance for large data.
        vFormatArr: ['Day', 'Week', 'Month', 'Quarter'], // Even with setUseSingleCell using Hour format on such a large chart can cause issues in some browsers,

    });

// Load from a Json url
    JSGantt.parseJSON('./fixes/data.json', g);

// Or Adding  Manually
    g.AddTaskItemObject({
        pID: 1,
        pName: "Define Chart <strong>API</strong>",
        pStart: "2017-02-25",
        pEnd: "2017-03-17",
        pPlanStart: "2017-04-01",
        pPlanEnd: "2017-04-15 12:00",
        pClass: "ggroupblack",
        pLink: "",
        pMile: 0,
        pRes: "Brian",
        pComp: 0,
        pGroup: 1,
        pParent: 0,
        pOpen: 1,
        pDepend: "",
        pCaption: "",
        pCost: 1000,
        pNotes: "Some Notes text",
        category: "My Category",
        sector: "Finance"
    });

    g.Draw();
});