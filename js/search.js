async function fetchNameAjax(id) {
    let str = "";
    let name = id.value;
    const url = "./services/eventNameService.php?name=" + name;
    try {
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error('Error, network error');
        }

        const events = await response.json();
        console.log("Events from server:", events); // Log the events to see their structure
        events.forEach(event => {
            str += `${event.event_name}: ${event.event_date}<br>`;
        });

        console.log("Download complete," + response);
        return str;
    } catch (e) {
        console.error(`Download error, ${e.message}`);
    }
}
