<?php require VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h3 class="text-center mt-5">Task #1 & Task #2 | Servers</h3>

    <p>
        1. A VPN can be used on the server which can change the IP and prevent crawled websites detecting the same
        IP of the connections. We can use openvpn to set a config file of the VPN provider. Example:
        <pre>
            sudo openvpn --config /etc/openvpn/vpn-file.ovpn
        </pre>
    </p>
    <p>
        2. Requests can be sent through a proxy which also can dynamically change the request IP and prevent crawled
        websites detect it. If we are using CURL, we can write a logic to dynamically change proxy settings.
        <pre>
            curl_setopt($ch, CURLOPT_PROXY, "https://proxy.domain.com");
            curl_setopt($ch, CURLOPT_PROXYPORT, "8080");
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, "username:pass");
        </pre>
    </p>

</div>

<?php require VIEW_PATH . 'partials/footer.php'; ?>
