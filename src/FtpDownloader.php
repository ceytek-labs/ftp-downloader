<?php

namespace CeytekLabs\FtpDownloader;

class FtpDownloader
{
    private string $ftpServer;
    private string $username;
    private string $password;
    private string $filePath;
    private string $localPath;

    public static function make(): self
    {
        return new self;
    }

    public function setFtpServer(string $ftpServer): self
    {
        $this->ftpServer = $ftpServer;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function setLocalPath(string $localPath): self
    {
        $this->localPath = $localPath;

        return $this;
    }

    public function download(): bool
    {
        if (! isset($this->ftpServer)) {
            throw new \Exception("FTP server is not set.");
        }

        if (! isset($this->username)) {
            throw new \Exception("Username is not set.");
        }

        if (! isset($this->password)) {
            throw new \Exception("Password is not set.");
        }

        if (! isset($this->filePath)) {
            throw new \Exception("File path is not set.");
        }

        if (! isset($this->localPath)) {
            throw new \Exception("Local path is not set.");
        }

        $filePointer = fopen($this->localPath, 'w');

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "ftp://{$this->ftpServer}{$this->filePath}",
            CURLOPT_USERPWD => "{$this->username}:{$this->password}",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_USE_SSL => CURLUSESSL_ALL,
            CURLOPT_FILE => $filePointer,
        ]);

        if (! curl_exec($curl)) {
            curl_close($curl);

            fclose($filePointer);

            throw new \Exception("File download failed: " . curl_error($curl));
        }

        curl_close($curl);

        fclose($filePointer);

        return true;
    }
}
