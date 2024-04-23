// Exportiert die Tabelle in eine CSV-Datei
function exportTableToCSV(filename) {
    const csv = [];
    const rows = document.querySelectorAll("table tr");
    
    for (const row of rows) {
        const rowData = [];
        const cols = row.querySelectorAll("td, th");
        
        for (const col of cols) {
            rowData.push(col.innerText);
        }
        
        csv.push(rowData.join(","));
    }
    
    const csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", filename);
    document.body.appendChild(link);
    link.click();
}

// Druckt die Tabelle
function printTable() {
    const printContents = document.getElementById("teilnehmer-tabelle").outerHTML;
    const originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}