<p align="center">
    <img src="https://raw.githubusercontent.com/ceytek-labs/ftp-downloader/refs/heads/1.x/art/banner.png" width="400" alt="FtpDownloader - Simple FTP File Downloader">
    <p align="center">
        <a href="https://packagist.org/packages/ceytek-labs/ftp-downloader"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/ceytek-labs/ftp-downloader"></a>
        <a href="https://packagist.org/packages/ceytek-labs/ftp-downloader"><img alt="Latest Version" src="https://img.shields.io/packagist/v/ceytek-labs/ftp-downloader"></a>
        <a href="https://packagist.org/packages/ceytek-labs/ftp-downloader"><img alt="Size" src="https://img.shields.io/github/repo-size/ceytek-labs/ftp-downloader"></a>
        <a href="https://packagist.org/packages/ceytek-labs/ftp-downloader"><img alt="License" src="https://img.shields.io/packagist/l/ceytek-labs/ftp-downloader"></a>
    </p>
</p>

------

# FtpDownloader - Simple FTP File Downloader

**FtpDownloader** is a lightweight and simple library designed to streamline downloading files over FTP using PHP. With just a few method calls, you can securely retrieve files from any FTP server.

> **Note:** This package assumes the FTP server supports explicit FTPS (FTP over SSL/TLS).

## Requirements

- PHP 7.0 or higher (including PHP 8)

## Installation

You can add this package to your project via Composer:

```bash
composer require ceytek-labs/ftp-downloader
```

## Usage

Here’s an example of how to use **FtpDownloader** to download a file from an FTP server:

```php
use CeytekLabs\FtpDownloader\FtpDownloader;

try {
    FtpDownloader::make()
        ->setFtpServer('ftp.example.com')
        ->setUsername('username')
        ->setPassword('password')
        ->setFilePath('/data/example.zip')
        ->setLocalPath('/local/path/example.zip')
        ->download();

    echo "File downloaded successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

## Contributing

Feel free to submit a **pull request** or report an issue. Any contributions and feedback are highly appreciated!

## License

This project is licensed under the MIT License.