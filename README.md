# IPL-Management-System
<img src="https://img.shields.io/badge/License-MIT-red.svg" alt="license"/></a>

A full system of Indian Premier League

---


## Contributing
1. **Fork** the repository.
2. **Clone** the project in your machine.
3. **Commit** changes to developer branch.
4. **Push** your work back up to your fork.
5. Submit a **Pull request** so that I can review your changes.



## Build with 
* HTML
* CSS
* JavaScript



## Step 1
1. Create database
```
CREATE DATABASE ipl
```

2. Create table fixture
```
CREATE TABLE fixture (
    date DATE NOT NULL,
    team1 VARCHAR(50) NOT NULL,
    team2 VARCHAR(50) NOT NULL,
    time INT(5) NOT NULL,
    venue VARCHAR(20) NOT NULL,
    team VARCHAR(50) NOT NULL,
    che INT(10) NOT NULL,
    team1s INT(4) NOT NULL,
    team2s INT(4) NOT NULL
);

```

3. Create table points

```
CREATE TABLE points (
    team VARCHAR(50) NOT NULL,
    pld INT(20) NOT NULL,
    won INT(20) NOT NULL,
    lost INT(20) NOT NULL,
    tied INT(20) NOT NULL,
    pts INT(20) NOT NULL,
);

```

4. Create table users

```
CREATE TABLE users (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    c_password VARCHAR(50) NOT NULL
);

```
