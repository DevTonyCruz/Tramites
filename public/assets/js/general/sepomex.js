"use strict"

const SepomexObject = {
    getStates: function(container) {

        RequestObject.AjaxJson('POST', 'sepomex/get-states').then(
            function(response) {

                $('#' + container + ' .state-data').empty();
                $('#' + container + ' .state-data').append('<option value="S">Seleccionar</option>');

                response.data.forEach(function(element) {
                    $('#' + container + ' .state-data').append('<option value="' + element.state + '">' + element.state + '</option>');
                });

                $('#' + container + ' .state-data').val('Nayarit');

            },
            function(xhrObj, textStatus, err) {
                alert(err);
            });
    },
    getLocation: function(container, state, municipio = '') {

        $('#' + container + ' .location-data').removeAttr("disabled");

        const data = {
            state: state,
        }

        RequestObject.AjaxJson('POST', 'sepomex/get-location-by-state', data).then(
            function(response) {

                $('#' + container + ' .location-data').empty();
                $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');

                $('#' + container + ' .colony-data').empty();
                $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                $('#' + container + ' .sepomex-id').val('');
                $('#' + container + ' .zip-code').val('');

                response.data.forEach(function(element) {
                    $('#' + container + ' .location-data').append('<option value="' + element.location + '">' + element.location + '</option>');
                });

                if (municipio != '') {
                    $('#' + container + ' .location-data').val('Tepic');
                }
            },
            function(xhrObj, textStatus, err) {
                $('#' + container + ' .location-data').empty();
                $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');
                $('#' + container + ' .colony-data').empty();
                $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');
            });
    },
    getColony: function(container, location) {

        $('#' + container + ' .colony-data').removeAttr("disabled");
        var state = $('#' + container + ' .state-data').val();

        const data = {
            'state': state,
            'location': location
        }

        RequestObject.AjaxJson('POST', 'sepomex/get-colonies-by-location-state', data).then(
            function(response) {

                $('#' + container + ' .colony-data').empty();
                $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                $('#' + container + ' .sepomex-id').val('');
                $('#' + container + ' .zip-code').val('');

                response.data.forEach(function(element) {
                    $('#' + container + ' .colony-data').append('<option value="' + element.id + '">' + element.name + ' - ' + element.zip_code + '</option>');
                });

            },
            function(xhrObj, textStatus, err) {
                alert(err);
            });
    },
    getColonyByStateAndLocation: function(container, state, location) {

        $('#' + container + ' .colony-data').removeAttr("disabled");

        const data = {
            'state': state,
            'location': location
        }

        RequestObject.AjaxJson('POST', 'sepomex/get-colonies-by-location-state', data).then(
            function(response) {

                $('#' + container + ' .colony-data').empty();
                $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                $('#' + container + ' .sepomex-id').val('');
                $('#' + container + ' .zip-code').val('');

                response.data.forEach(function(element) {
                    $('#' + container + ' .colony-data').append('<option value="' + element.id + '">' + element.name + ' - ' + element.zip_code + '</option>');
                });

            },
            function(xhrObj, textStatus, err) {
                alert(err);
            });
    },
    getZipCode: function(container, sepomex_id) {

        const data = {
            'sepomex_id': sepomex_id
        }

        RequestObject.AjaxJson('POST', 'sepomex/get-zip-code', data).then(
            function(response) {

                $('#' + container + ' .zip-code').val(response.data.zip_code);
                $('#' + container + ' .sepomex-id').val(response.data.id);

            },
            function(xhrObj, textStatus, err) {
                alert(err);
            });
    },
    searchZip: function(container) {

        var zip_code = $('#' + container + ' .zip-code').val();
        $('#' + container + ' .sepomex-id').val('');

        if (zip_code.length == 5) {

            const data = {
                'zip_code': zip_code
            }

            RequestObject.AjaxJson('POST', 'sepomex/get-search-zip-code', data).then(
                function(response) {

                    let state = response.data[0].state;
                    let location = response.data[0].location;
                    const colonies = response.data;

                    $('#' + container + ' .state-data').val(state);

                    const data = {
                        state: state,
                    }

                    RequestObject.AjaxJson('POST', 'sepomex/get-location-by-state', data).then(
                        function(response) {

                            $('#' + container + ' .location-data').removeAttr('disabled');
                            $('#' + container + ' .location-data').empty();
                            $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');

                            response.data.forEach(function(element) {
                                $('#' + container + ' .location-data').append('<option value="' + element.location + '">' + element.location + '</option>');
                            });

                            $('#' + container + ' .location-data').val(location);

                            $('#' + container + ' .colony-data').removeAttr('disabled');
                            $('#' + container + ' .colony-data').empty();
                            $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                            colonies.forEach(function(element) {
                                $('#' + container + ' .colony-data').append('<option value="' + element.id + '">' + element.name + ' - ' + element.zip_code + '</option>');
                            });

                        },
                        function(xhrObj, textStatus, err) {
                            $('#' + container + ' .location-data').empty();
                            $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');
                            $('#' + container + ' .colony-data').empty();
                            $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');
                        });

                },
                function(xhrObj, textStatus, err) {
                    alert(err);
                });
        }
    },
    searchZipSelected: function(container, sepomex_id) {

        var zip_code = $('#' + container + ' .zip-code').val();
        $('#' + container + ' .sepomex-id').val('');

        if (zip_code.length == 5) {

            const data = {
                'zip_code': zip_code
            }

            RequestObject.AjaxJson('POST', 'sepomex/get-search-zip-code', data).then(
                function(response) {

                    let state = response.data[0].state;
                    let location = response.data[0].location;
                    const colonies = response.data;

                    $('#' + container + ' .state-data').val(state);

                    const data = {
                        state: state,
                    }

                    RequestObject.AjaxJson('POST', 'sepomex/get-location-by-state', data).then(
                        function(response) {

                            $('#' + container + ' .location-data').removeAttr('disabled');
                            $('#' + container + ' .location-data').empty();
                            $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');

                            response.data.forEach(function(element) {
                                $('#' + container + ' .location-data').append('<option value="' + element.location + '">' + element.location + '</option>');
                            });

                            $('#' + container + ' .location-data').val(location);

                            $('#' + container + ' .colony-data').removeAttr('disabled');
                            $('#' + container + ' .colony-data').empty();
                            $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                            colonies.forEach(function(element) {
                                $('#' + container + ' .colony-data').append('<option value="' + element.id + '">' + element.name + ' - ' + element.zip_code + '</option>');
                            });

                            $('#' + container + ' .colony-data').val(sepomex_id);
                            $('#' + container + ' .sepomex-id').val(sepomex_id)

                        },
                        function(xhrObj, textStatus, err) {
                            $('#' + container + ' .location-data').empty();
                            $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');
                            $('#' + container + ' .colony-data').empty();
                            $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');
                        });

                },
                function(xhrObj, textStatus, err) {
                    alert(err);
                });
        }
    },
    searchZipSelectedEditing: function(container, zip_code, sepomex_id) {

        if (zip_code.length == 5) {

            const data = {
                'zip_code': zip_code
            }

            RequestObject.AjaxJson('POST', 'sepomex/get-search-zip-code', data).then(
                function(response) {

                    let state = response.data[0].state;
                    let location = response.data[0].location;
                    const colonies = response.data;

                    RequestObject.AjaxJson('POST', 'sepomex/get-states').then(
                        function(response) {

                            $('#' + container + ' .state-data').empty();
                            $('#' + container + ' .state-data').append('<option value="S">Seleccionar</option>');

                            response.data.forEach(function(element) {
                                $('#' + container + ' .state-data').append('<option value="' + element.state + '">' + element.state + '</option>');
                            });
                            $('#' + container + ' .state-data').val(state)

                        },
                        function(xhrObj, textStatus, err) {
                            alert(err);
                        });

                    $('#' + container + ' .state-data').val(state);

                    const data = {
                        state: state,
                    }

                    RequestObject.AjaxJson('POST', 'sepomex/get-location-by-state', data).then(
                        function(response) {

                            $('#' + container + ' .location-data').removeAttr('disabled');
                            $('#' + container + ' .location-data').empty();
                            $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');

                            response.data.forEach(function(element) {
                                $('#' + container + ' .location-data').append('<option value="' + element.location + '">' + element.location + '</option>');
                            });

                            $('#' + container + ' .location-data').val(location);

                            $('#' + container + ' .colony-data').removeAttr('disabled');
                            $('#' + container + ' .colony-data').empty();
                            $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                            colonies.forEach(function(element) {
                                $('#' + container + ' .colony-data').append('<option value="' + element.id + '">' + element.name + ' - ' + element.zip_code + '</option>');
                            });

                            $('#' + container + ' .colony-data').val(sepomex_id);
                            $('#' + container + ' .sepomex-id').val(sepomex_id)

                        },
                        function(xhrObj, textStatus, err) {
                            $('#' + container + ' .location-data').empty();
                            $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');
                            $('#' + container + ' .colony-data').empty();
                            $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');
                        });

                },
                function(xhrObj, textStatus, err) {
                    alert(err);
                });
        }
    },
    getStatesByState: function(container, state) {

        RequestObject.AjaxJson('POST', 'sepomex/get-states').then(
            function(response) {

                $('#' + container + ' .state-data').empty();
                $('#' + container + ' .state-data').append('<option value="S">Seleccionar</option>');

                response.data.forEach(function(element) {
                    $('#' + container + ' .state-data').append('<option value="' + element.state + '">' + element.state + '</option>');
                });

                $('#' + container + ' .state-data').val(state);

            },
            function(xhrObj, textStatus, err) {
                alert(err);
            });
    },
    getLocationsByStateLocation: function(container, state, municipio) {

        $('#' + container + ' .location-data').removeAttr("disabled");

        const data = {
            state: state,
        }

        RequestObject.AjaxJson('POST', 'sepomex/get-location-by-state', data).then(
            function(response) {

                $('#' + container + ' .location-data').empty();
                $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');

                $('#' + container + ' .colony-data').empty();
                $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');

                $('#' + container + ' .sepomex-id').val('');
                $('#' + container + ' .zip-code').val('');

                response.data.forEach(function(element) {
                    $('#' + container + ' .location-data').append('<option value="' + element.location + '">' + element.location + '</option>');
                });

                if (municipio != '') {
                    $('#' + container + ' .location-data').val(municipio);
                }
            },
            function(xhrObj, textStatus, err) {
                $('#' + container + ' .location-data').empty();
                $('#' + container + ' .location-data').append('<option value="S">Seleccionar</option>');
                $('#' + container + ' .colony-data').empty();
                $('#' + container + ' .colony-data').append('<option value="S">Seleccionar</option>');
            });
    },
}

/*
==================================================================
                            Eventos
==================================================================
*/
