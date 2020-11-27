# WeSat 
Our project for the NASA Space Apps Challenge 2020. 

We are WeSat, a team of NTUA ECE's students, consisted by:
* Giorgos Tseligas ([@gtseligas](https://github.com/gtseligas)) 
* Constantinos Papadopoulos ([@cnpapado](https://github.com/cnpapado))
* Yiorgos Yiannkoulias ([@yiorgosynkl](https://github.com/yiorgosynkl))
* Ilias Paralikas
* Dimitrios Georgiou ([@jimmyg1997](https://github.com/jimmyg1997))

Our project has been selected as the Global nominee :earth_africa: :boom: by the local hackathon event's (Piraeus, GR) judges, passing to the global judging process.

## The challenge
We chose the "Orbital sky" problem, a challenge aiming to improve public awareness of artificial satellites. 
With a love for amateur astronomy and the night sky we also wanted to extend this and combine it with a way of engaging more people with the sky and the stars above us. 

So, we created a webapp that visualizes satellite orbits, and motivates users to locate and observe them in the night sky by gamifying observation, encouraging them to learn more about both celestial technology and amateur astronomy.

## Project description
The user "collects" satellites via observing them on the sky, in order to gain access to a satellite point of view. 

After getting the user's location, the app displays a planetarium view of the night sky 
with the satellites currently in orbit above him. Satellites observed in the past will be marked green, 
and clicking them will redirect the user to a view of earth and neighboring satellites, from a "satellite-view" perspective. 
Those not previously observed, displayed in red, will prompt the user to locate them -if they are visible- on the sky, using the device's gyroscope.


<img src="https://i.imgur.com/3yalaSt.png" height="500">

<img src="https://i.imgur.com/buxjrCM.png" height="600">

If the satellite is "locked" you will need to observe it on the sky to unlock it.

![mobile found screeshot](https://i.imgur.com/RYrXdI0.jpg)
![qr code screenshot](https://i.imgur.com/AMC57YR.png)

When successfully located and thus "unlocked" you will be able to get in orbit and see the Earth through satellite view!

<img src="https://i.imgur.com/YBOgH7a.png" height="300">

<img src="https://i.imgur.com/4jv7u45.png" height="300">

## Space agency data and technologies used 
* NASA WorldWind API - globe viewer and "sat point of view" screen
* Virtual Sky API - planetarium view of the night sky we used 
* N2YO API - satellite data 
* Full-Tilt JavaScript library - gyroscope feature

API's are tied together in JavaScript. We also implemented a database in the back end, storing users and previously unlocked satellites, using MySQL and php.
Below is a draft of the designed project structure:

<img src="https://i.imgur.com/jMlhfM3.jpg" height="500">

<img src="https://i.imgur.com/swSdXgN.jpg" height="300">

:purple_heart:

