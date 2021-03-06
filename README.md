biom-conversion-server
======================

A simple php server that can convert [biom version 2
(hdf5)](http://biom-format.org/documentation/format_versions/biom-2.0.html)
files and data to [biom version 1
(json)](http://biom-format.org/documentation/format_versions/biom-1.0.html)
and vice versa. It simply provides a web and API interface to the convert
feature of the [official python biom format
tool](http://biom-format.org/index.html#installing-the-biom-format-python-package).
This project is not part of the official biom project.

Please cite our article at f1000 Research that describes this module:
```
Markus J. Ankenbrand, Niklas Terhoeven, Sonja Hohlfeld, Frank Förster, and Alexander Keller.
biojs-io-biom, a BioJS component for handling data in Biological Observation Matrix (BIOM) format[version 2; referees: 1 approved, 2 approved with reservations].
F1000Research 2017, 5:2348. doi: 10.12688/f1000research.9618.2
```
You can cite the current version of this software repository using the Zenodo [![Zenodo](https://zenodo.org/badge/12731/molbiodiv/biom-conversion-server.svg)](https://zenodo.org/badge/latestdoi/12731/molbiodiv/biom-conversion-server)

Please cite the original biom project in addition to this project as:

    The Biological Observation Matrix (BIOM) format or: how I learned to stop worrying and love the ome-ome.
    Daniel McDonald, Jose C. Clemente, Justin Kuczynski, Jai Ram Rideout, Jesse Stombaugh, Doug Wendel, Andreas Wilke, Susan Huse, John Hufnagle, Folker Meyer, Rob Knight, and J. Gregory Caporaso.
    GigaScience 2012, 1:7. doi:10.1186/2047-217X-1-7

A public instance of the server is running at [https://biomcs.iimog.org](https://biomcs.iimog.org)

  --------------- --------------------------------------------------------------------------------------------------------------------------------------------------------------------
 - Cite Project    [![DOI](https://img.shields.io/badge/DOI-10.12688%2Ff1000research.9618.2-blue.svg)](https://dx.doi.org/10.12688/f1000research.9618.2) and [![Zenodo](https://zenodo.org/badge/12731/molbiodiv/biom-conversion-server.svg)](https://zenodo.org/badge/latestdoi/12731/molbiodiv/biom-conversion-server)
 - License         [![MIT](https://img.shields.io/badge/License-MIT-blue.svg)](file:LICENSE)
 - Build Status    [![Travis](https://travis-ci.org/molbiodiv/biom-conversion-server.svg?branch=master)](https://travis-ci.org/molbiodiv/biom-conversion-server)
 - Test Coverage   [![Coveralls](https://coveralls.io/repos/github/molbiodiv/biom-conversion-server/badge.svg?branch=master)](https://coveralls.io/github/molbiodiv/biom-conversion-server?branch=master)
 - Code Climate    [![CodeClimate](https://codeclimate.com/github/molbiodiv/biom-conversion-server/badges/gpa.svg)](https://codeclimate.com/github/molbiodiv/biom-conversion-server)
 - Docker          [![DockerPulls](https://img.shields.io/docker/pulls/iimog/biom-conversion-server.svg?maxAge=2592000)](https://hub.docker.com/r/iimog/biom-conversion-server/)

  --------------- --------------------------------------------------------------------------------------------------------------------------------------------------------------------

Getting started
---------------

To run your own conversion server on localhost port 8080 using the
docker container execute the following commands:

``` {.bash}
docker pull iimog/biom-conversion-server
# Use any other port by exchanging 8080 with your desired port number
docker run -d --publish 8080:80 --name biomcs iimog/biom-conversion-server
```

Now you can visit your conversion server in the browser at
<http://localhost:8080/> And you can point tools that use the conversion
api as a webservice to <http://localhost:8080/convert.php> (e.g.
[biojs-io-biom](https://github.com/molbiodiv/biojs-io-biom)).

Changes
-------

### 1.0.6 (2018-10-04)

-   Update node version in docker container
-   Update required bootstrap version (CVE-2018-14041)

### 1.0.5 (2018-03-27)

-   Update biom-format to version 2.1.6

### 1.0.4 (2017-07-28)

-   Switch from bower to yarn
-   Update dependencies
-   Update of biojs-io-biom to version 1.0.9

### 1.0.3 (2017-03-29)

-   Update of biojs-io-biom to version 1.0.7

### 1.0.2 (2016-12-22)

-   Fix docker image

### 1.0.1 (2016-12-22)

-   Update of biojs-io-biom to version 1.0.6

### 1.0.0 (2016-09-07)

-   Update of biojs-io-biom to version 1.0.1

### 0.4.0 (2016-09-06)

-   Add details to error messages

### 0.3.0 (2016-07-29)

-   Use biojs-io-biom for UI
-   Add UI to start page (file upload/download)
-   Increase php server limits

### 0.2.0 (2016-07-25)

-   returned content is base64 encoded string
-   require content as base64 encoded string
-   handle post data passed as json
-   set correct content-type header
-   allow CORS requests

### 0.1.0 (2016-07-08)

-   convert to json
-   convert to hdf5
-   docker container
-   integrate testing

