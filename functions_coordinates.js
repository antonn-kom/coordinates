function getCoordinatForClient()
{
    const pointCenter = myMap.getGlobalPixelCenter();
    const map = myMap.container.getSize();

    let topLeftX = 0;
    let topLeftY = 0;
    let bottomLeftX = 0;
    let bottomLeftY = 0;

    topLeftX = Math.floor((pointCenter[0] - map[0] / 2) / 256) * Math.pow(2, 23 - myMap.getZoom());
    topLeftY = Math.floor((pointCenter[1] - map[1] / 2) / 256) * Math.pow(2, 23 - myMap.getZoom());
    bottomLeftX = Math.ceil((pointCenter[0] - map[0] / 2) / 256) * Math.pow(2, 23 - myMap.getZoom());
    bottomLeftY = Math.ceil((pointCenter[1] - map[1] / 2) / 256) * Math.pow(2, 23 - myMap.getZoom());
}
